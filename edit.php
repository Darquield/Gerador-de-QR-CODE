<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "Wagner";
$password = "123";
$dbname = "pap";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Verificar se o usuário deseja excluir o registro
    if (isset($_POST['excluir'])) {
        $delete_query = "DELETE FROM usuarios WHERE id='$id'";
        if ($conn->query($delete_query) === TRUE) {
            header("Location: admin.php");
            exit;
        } else {
            echo "Erro ao excluir registro: " . $conn->error;
        }
    }

    // Consulta para obter as informações do usuário
    $select_query = "SELECT * FROM usuarios WHERE id = '$id'";
    $result = $conn->query($select_query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nome = $row["nome"];
        $email = $row["email"];
    } else {
        echo "Nenhum usuário encontrado com esse ID.";
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    
<h2>Editar Usuário</h2>

<form method="post">
    Nome:<br>
    <input type="text" name="nome" value="<?php echo $nome; ?>"><br><br>
    Email:<br>
    <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
    <input type="submit" value="Salvar">
</form>

<form method="post">
    <input type="hidden" name="excluir" value="1">
    <input type="submit" value="Excluir">
</form>

</body>
</html>
