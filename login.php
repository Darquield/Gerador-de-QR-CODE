<?php
session_start();

// Função para conectar ao banco de dados (substitua pelas suas informações)
function conectarAoBanco() {
    $servername = "localhost"; // Nome do servidor MySQL
    $username = "Wagner"; // Nome de usuário do banco de dados
    $password = "123"; // Senha do banco de dados
    $database = "pap"; // Nome do banco de dados

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    return $conn;
}

// Verificar se o formulário de login foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Receber os dados do formulário
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Conectar ao banco de dados
    $conn = conectarAoBanco();

    // Consulta SQL para verificar as credenciais
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = mysqli_fetch_assoc($result);
        $senha_db = $row['senha'];

        if (password_verify($senha, $senha_db)){
            $_SESSION["user_id"] = $row['id'];
            $_SESSION["usuario_logado"] = true;

            // Adicione esta linha para exibir a mensagem de sucesso usando JavaScript
            echo "<script>alert('Sessão iniciada com sucesso!'); window.location.href='index1.php';</script>";

            // Verificar se o usuário é um administrador
            if ($row['admin'] == 1) {
                $_SESSION["admin"] = true;
                header("Location: pagina_admin.php"); // Redirecionar o administrador para uma página específica
            } else {
                $_SESSION["admin"] = false;
                header("Location: index1.php"); // Redirecionar o usuário comum para uma página específica
            }
            exit();
        } else {
            echo "<script>alert('Senha incorreta. Tente novamente.'); window.location.href='loginn.php'</script>";
        }
    } else {
        // Login falhou
        $_SESSION["login_erro"] = "Email ou senha incorretos";
        header("Location: loginn.php"); // Redirecionar de volta para a página de login
        exit();
    }
}


?>
