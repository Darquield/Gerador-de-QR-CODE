<?php
$servername = "localhost";
$username = "Wagner";
$password = "123";
$dbname = "pap";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $novaSenha = $_POST["novaSenha"];

    // Verificar se o e-mail existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Atualizar a senha para o novo valor
        $hashedNovaSenha = password_hash($novaSenha, PASSWORD_DEFAULT);
        $sqlUpdate = "UPDATE usuarios SET senha = '$hashedNovaSenha' WHERE email = '$email'";
        
        if ($conn->query($sqlUpdate) === TRUE) {
            echo "<script>alert('Senha alterada com sucesso.'); window.location.href='loginn.php'</script>";
            // Redirecionar para a página de login após a atualização bem-sucedida
            header("Location: loginn.php");
            exit(); // Certifique-se de sair para evitar execução adicional do código
        } else {
            echo "Erro ao atualizar a senha: " . $conn->error;
        }
    } else {
        echo "E-mail não encontrado na base de dados.";
    }

    $conn->close();
}
?>
