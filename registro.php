<?php
// Informações de conexão com o banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "Wagner"; // Nome de usuário do banco de dados
$password = "123"; // Senha do banco de dados
$database = "pap"; // Nome do banco de dados

// Criar uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Processar o registro se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $confirmaSenha = $_POST["confirmaSenha"];

    // Verificar se as senhas são iguais
    if ($senha !== $confirmaSenha) {
        echo "<script>alert('As senhas não coincidem. Tente novamente.'); window.location.href='registroo.php'</script>";
    } else {

        $sql2 = "SELECT * FROM usuarios WHERE email='$email'";
        $result = $conn->query($sql2);

        if ($result->num_rows == 0) {
     
    // Criptografar a senha
    $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);

    // Executar a inserção na tabela de usuários com a senha criptografada
    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$hashed_senha')";

    if ($conn->query($sql) === TRUE) {
       header('location:loginn.php');
    } else {
        echo "Erro no registro: " . $conn->error;
    }
} else {
    echo "<script>alert('Este e-mail já tem uma conta. Por favor fazer login.'); window.location.href='registroo.php'</script>";
}
}
}
?>
