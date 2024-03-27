

<?php
$servername = "localhost";
$username = "Wagner";
$password = "123";
$dbname = "pap";

// Criar conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coletar os dados do formulário
    $id_equipa_piloto = $_POST['id_equipa_piloto'];
    $id_equipas = $_POST['id_equipas'];
    $id_pilotos = $_POST['id_pilotos'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO equipa_premio (id_equipa_piloto, id_equipas, id_pilotos)
    VALUES ('$id_equipa_piloto', '$id_equipas', '$id_pilotos')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro inserido com sucesso";
    } else {
        echo "Erro ao inserir registro: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<body>

<h2>Adicionar Equipa Piloto</h2>

<form  method="post">
  ID Equipa Piloto:<br>
  <input type="text" name="id_equipa_piloto">
  <br>
  ID Equipas:<br>
  <input type="text" name="id_equipas">
  <br>
  ID Pilotos:<br>
  <input type="text" name="id_pilotos">
  <br><br>
  <input type="submit" value="Adicionar">
</form>
<form action="pagina_admin.php">
    <button type="submit">Voltar</button>
</body>
</html>
