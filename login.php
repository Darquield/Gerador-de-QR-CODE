<?php
session_start();

// Função para conectar ao banco de dados (substitua pelas suas informações)
function conectarAoBanco() {
    $servername = "localhost"; // Nome do servidor MySQL
    $username = "Wagner"; // Nome de usuário do banco de dados
    $password = "123"; // Senha do banco de dados
    $database = "gerenciador"; // Nome do banco de dados

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    return $conn;
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consultar o banco de dados para verificar as credenciais
    $stmt = $pdo->prepare("SELECT * FROM Utilizadores WHERE Email = :email");
    $stmt->execute(['email' => $email]);
    $usuario = $stmt->fetch();

    // Verificar se o usuário existe e se a senha está correta
    if ($usuario && password_verify($senha, $usuario['Senha'])) {
        // Login bem-sucedido
        session_start();
        $_SESSION['usuario_id'] = $usuario['ID'];
        $_SESSION['usuario_nome'] = $usuario['Nome'];
        // Redirecionar para a página de perfil, por exemplo
        header("Location: perfil.php");
        exit();
    } else {
        // Credenciais inválidas
        echo "<script>alert('Credencias inválidas. Por favor, tente novamente.'); window.location.href='login.php'</script>";

    }
}
?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
  border-radius: 12px;
  padding: 93px 440px;
}
/* Adicionando uma regra de mídia para dispositivos com largura menor que 600px */
@media (max-width: 600px) {
    .wrapper {
        width: 90%; /* Ajuste conforme necessário para dispositivos menores */
    }
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
.wrapper .input-box {
  position: relative;
  width: 100%;
  height: 50px;

  margin: 30px 0;
}
.input-box input {
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
.input-box input::placeholder {
  color: #fff;
}

.wrapper .remember-forgot {
  display: flex;
  justify-content: space-between;
  font-size: 14.5px;
  margin: -15px 0 15px;
}
.remember-forgot label input {
  accent-color: #fff;
  margin-right: 3px;
}
.remember-forgot a {
  color: #fff;
  text-decoration: none;
}
.remember-forgot a:hover {
  text-decoration: underline;
}
.wrapper .btn {
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
  margin-left: 130px;
  margin-top: 10px;
}
.wrapper .register-link {
  font-size: 14.5px;
  text-align: center;
  margin: 20px 0 15px;
}
.register-link p a {
  color: #fff;
  text-decoration: none;
  font-weight: 600;
}
.register-link p a:hover {
  text-decoration: underline;
}

    </style>
<body>
    
<div class="wrapper">
        <img class="logo" src="./image/logo.png" alt="Logo" alt="" width="100">
<form action="login.php">
    <p class="form-login">Login</p>
    <div class="input-box">
      <input required="" placeholder="Username" type="text" />
    </div>
    <div class="input-box">
      <input required="" placeholder="Password" type="password" />
    </div>
    <div class="remember-forgot">
      <label><input type="checkbox" />Remember Me</label>
      <a href="#">Forgot Password</a>
    </div>
    <button class="btn" type="submit">Login</button>
    <div class="register-link">
      <p>Dont have an account? <a href="registro.php">Register</a></p>
    </div>
  </form>
</div>

    </form>
</body>
</html>
