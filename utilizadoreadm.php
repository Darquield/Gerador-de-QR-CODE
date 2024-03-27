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

// Excluir usuário
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_query = "DELETE FROM usuarios WHERE id = '$id'";
    $conn->query($delete_query);
}

// Consulta para selecionar todos os usuários
$select_query = "SELECT * FROM usuarios";
$result = $conn->query($select_query);
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

<h2>Lista dos utilizadores</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Ações</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td><a href='edit.php?id=" . $row["id"] . "'>Editar</a> | <a href='?delete_id=" . $row["id"] .
             "'>Excluir</a></td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nenhum usuário encontrado</td></tr>";
    }
    ?>
</table>
<form action="pagina_admin.php">
    <button type="submit">Voltar</button>
</body>
</html>

