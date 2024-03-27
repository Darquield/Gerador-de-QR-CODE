<?php
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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Receba os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    // Verifique se um arquivo de imagem foi enviado
    if ($_FILES['avatar']['name']) {
        $avatar_temp = $_FILES['avatar']['tmp_name'];
        $avatar_nome = $_FILES['avatar']['name'];
        $avatar_destino = __DIR__ . '/image/' . $avatar_nome;


        // Mova o arquivo de imagem para o destino
        move_uploaded_file($avatar_temp, $avatar_destino);

        // Atualize o nome da foto de perfil no banco de dados
        $sql_update_avatar = "UPDATE usuarios SET foto = '$avatar_nome' WHERE id = $user_id";
        $conn->query($sql_update_avatar);
    }

    // Atualize as informações do perfil no banco de dados
    $sql = "UPDATE usuarios SET nome = '$nome', email = '$email' WHERE id = $user_id";

    if ($conn->query($sql)) {
        // Redirecione de volta para a página de perfil com uma mensagem de sucesso

        // Exiba uma mensagem de sucesso usando JavaScript
        echo "<script>alert('Perfil atualizado com sucesso.');</script>";

        // Redirecione de volta para a página de perfil
        header("Location: prefile.php");
        exit();
    } else {
        // Se houver um erro na consulta SQL, você pode redirecionar de volta com uma mensagem de erro
        header("Location: prefile.php?erro=Erro ao atualizar o perfil: " . $conn->error);
        exit();
    }


    $conn->close();
} else {
    // Redirecione para a página de perfil se o método de solicitação não for POST
    header("Location: prefile.php");
}
?>