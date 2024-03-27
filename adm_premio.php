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
    $descricao = $_POST['descricao'];
    $data = $_POST['data'];
    $nome = $_POST['nome'];

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO premio (id_premio, descricao, data, nome)
    VALUES ('$id_premio', '$descricao', '$data', '$nome')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Registro inserido com sucesso.');</script>";
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
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="date"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
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

        </style>
<body>

<h2>Adicionar Prêmio</h2>

<form action="premios.php" method="post">
  ID Prêmio:<br>
  <input type="text" name="id_premio">
  <br>
  Descrição:<br>
  <input type="text" name="descricao">
  <br>
  Data:<br>
  <input type="date" name="data">
  <br>
  Nome:<br>
  <input type="text" name="nome">
  <br><br>
  <input type="submit" value="Adicionar">
</form>
<form action="pagina_admin.php">
    <button type="submit">Voltar</button>
</form>

</body>
</html>
