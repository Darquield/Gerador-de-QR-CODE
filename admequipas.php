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
    $id_equipas = $_POST['id_equipas'];
    $nome = $_POST['nome'];
    $data_criada = $_POST['data_criada'];
    $mail = $_POST['mail'];
    

    // Inserir os dados no banco de dados
    $sql = "INSERT INTO equipas (id_equipas, nome, data_criada, mail)
    VALUES ('$id_equipas', '$nome', '$data_criada', '$mail')";

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

<h2>Adicionar Equipas</h2>

<form  method="post">
  ID Equipas:<br>
  <input type="text" name="id_equipas">
  <br>
  Nome:<br>
  <input type="text" name="nome">
  <br>
  Data Criada:<br>
  <input type="text" name="data_criada">
  <br>
  Email:<br>
  <input type="text" name="mail">
  <br><br>
  <input type="submit" value="Adicionar">
</form>
<form action="pagina_admin.php">
    <button type="submit">Voltar</button>

</body>
</html>
