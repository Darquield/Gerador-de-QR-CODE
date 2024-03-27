<?php
// Informações de conexão com o banco de dados
$servername = "localhost"; // Nome do servidor MySQL
$username = "Wagner"; // Nome de usuário do banco de dados
$password = "123"; // Senha do banco de dados
$database = "gerenciador"; // Nome do banco de dados

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
        echo "<script>alert('As senhas não coincidem. Tente novamente.'); window.location.href='registro.php'</script>";
    } else {
        // Verificar se o formato do e-mail é válido
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Por favor, insira um e-mail válido.'); window.location.href='registro.php'</script>";
            exit;
        }

        // Verificar se o domínio do e-mail realmente existe
        list($user, $domain) = explode('@', $email);
        if (!checkdnsrr($domain, 'MX')) {
            echo "<script>alert('O domínio do e-mail não existe.'); window.location.href='registro.php'</script>";
            exit;
        }

        // Verificar se o e-mail já está registrado no banco de dados
        $sql = "SELECT * FROM utilizadores WHERE email='$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            echo "<script>alert('Este e-mail já está registrado. Por favor, use outro e-mail.'); window.location.href='registro.php'</script>";
            exit;
        }

        // Criptografar a senha
        $hashed_senha = password_hash($senha, PASSWORD_DEFAULT);

        // Executar a inserção na tabela de usuários com a senha criptografada
        $sql = "INSERT INTO utilizadores (nome, email, senha) VALUES ('$nome', '$email', '$hashed_senha')";

        if ($conn->query($sql) === TRUE) {
            header('location:login.php');
        } else {
            echo "Erro no registro: " . $conn->error;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link rel="stylesheet" href="seu-arquivo-de-estilo.css">
</head>
<style>
    .wrapper {
        width: 80%; /* Ajuste conforme necessário */
    max-width: 400px; /* Definindo uma largura máxima para o contêiner */
    margin: 0 auto; /* Margens automáticas para centralizar o contêiner */
    padding: 40px; /* Adicionando um espaço interno */
    background: rgb(2, 0, 36);
    background: linear-gradient(
        90deg,
        rgba(2, 0, 36, 1) 9%,
        rgba(9, 9, 121, 1) 68%,
        rgba(0, 91, 255, 1) 97%
    );
    backdrop-filter: blur(9px);
    color: #fff;
    border-radius: 10px;
    padding: 50px 440px;
}
.logo {
        position: absolute;
        top: 10px;
        left: 20px;
        width: 100px; /* Ajuste conforme necessário */
        height: auto; /* Ajuste conforme necessário */
    }

.form-login {
    font-size: 36px;
    text-align: center;
}

.user-box {
    position: relative;
    width: 100%;
    height: 50px;
    margin: 30px 0;
}

.user-box input {
    width: 100%;
    height: 100%;
    background: transparent;
    border: none;
    outline: none;
    border: 2px solid rgba(255, 255, 255, 0.2);
    border-radius: 20px;
    font-size: 16px;
    color: #fff;
    padding: 20px 4px -4px 20px;
}

.user-box input::placeholder {
    color: #fff;
}

.button-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

button[type="submit"] {
    width: 150px;
    height: 45px;
    background: #fff;
    border: none;
    outline: none;
    border-radius: 40px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    cursor: pointer;
    font-size: 16px;
    color: #333;
    font-weight: 600;
}

.button-container a {
    color: #fff;
    text-decoration: none;
    font-size: 14.5px;
}

.button-container a:hover {
    text-decoration: underline;
}

    </style>
<body>
<div class="wrapper">
        <img class="logo" src="./image/logo.png" alt="Logo" alt="" width="100">
        <form action="registro.php" method="POST">
            <h2 class="form-login">Registar-se</h2>
            <div class="user-box">
                <input type="text" name="nome" placeholder="Full Name">
                <label>Nome Completo</label>
            </div>
            <div class="user-box">
                <input type="email" name="email" placeholder="Email">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="senha" placeholder="Password">
                <label>Senha</label>
            </div>
            <div class="user-box">
                <input type="password" name="confirmaSenha" placeholder="Confirmar Password">
                <label>Confirmar Senha</label>
            </div>
            <div class="button-container">
                <button type="submit">Registar</button>
                <a href="login.php">Já tens conta?</a>
            </div>
        </form>
    </div>
</body>
</html>


