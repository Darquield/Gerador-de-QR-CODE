<?php
// Certifique-se de que a sessão esteja iniciada
session_start();

// Verifique se o usuário está autenticado (verifique sua lógica de autenticação)
if (!isset($_SESSION['user_id'])) {
    // Redirecione para a página de login se o usuário não estiver autenticado
    header("Location: loginn.php");
    exit();
}

// Conecte-se ao banco de dados (substitua com suas próprias credenciais)
include_once('conexao.php');

// ID do usuário da sessão
$user_id = $_SESSION['user_id'];

// Consulta SQL para buscar informações do perfil com base no ID do usuário
$sql = "SELECT * FROM usuarios WHERE id = $user_id";

$resultado = $conn->query($sql);

// Obtenha os dados do perfil
$row = $resultado->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css.lll.css"> <!-- Certifique-se de criar um arquivo de estilo CSS (style.css) -->
    <title>Perfil</title>

</head>
<body>

    <div class="profile">
        <h1>Seu Perfil</h1>
        <form action="salvar_perfil.php" method="POST" enctype="multipart/form-data">
            <div class="profile-picture">
                <img src="image/<?php echo $row['foto']; ?>" alt="Sua Foto de Perfil" style="display: block; margin: 0 auto;">
                <input type="file" name="avatar" accept="image/*" id="avatar" style="display: none;">
                <label for="avatar" class="change-avatar">Alterar Foto</label>
            </div>
            <div class="profile-info">
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $row['nome'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" value="<?php echo $row['email'] ?>">
                </div>
            </div>
            <button type="submit">Guardar</button> 
            <div class="voltar">
        <a href="perfil.php" onclick="history.go(-1); return false;">Voltar</a>
    </div>
        </form>
    </div>
</body>
</html>
</div>
   