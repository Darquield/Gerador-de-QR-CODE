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
    $id_premio = $_POST['id_premio'];
    $id_equipas = $_POST['id_equipas'];
    

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO equipa_premio (id_premio, id_equipas) VALUES ('$id_premio', '$id_equipas')";

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
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    box-sizing: border-box;
}

input[type="submit"],
button {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover,
button:hover {
    background-color: #45a049;
}

button {
    background-color: #333;
    margin-top: 10px;
}

button:hover {
    background-color: #1e1e1e;
}

form[action="pagina_admin.php"] {
    margin-top: 20px;
    text-align: center;
}

        </style>
<body>

<h2>Adicionar Prêmios Das Equipas</h2>

<form method="post">
  ID Prêmio:<br>
  <input type="text" name="id_premio">
  <br>
  ID Equipas:<br>
  <input type="text" name="id_equipas">
  <br>
  <br><br>
  <input type="submit" value="Adicionar">
</form>
<form action="pagina_admin.php">
    <button type="submit">Voltar</button>
</form>

</body>
</html>
