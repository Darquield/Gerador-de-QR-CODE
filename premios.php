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

// Consulta SQL para selecionar todos os registros da tabela
$sql = "SELECT * FROM premio";
$result = $conn->query($sql);

if (!$result) {
    trigger_error('Invalid query: ' . $conn->error);
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Dados da Tabela Prêmios</h2>

<table>
  <tr>
    <th>ID Prêmio</th>
    <th>Descrição</th>
    <th>Data</th>
    <th>Nome</th>
  </tr>
  <?php
  if ($result->num_rows > 0) {
    // Saída de cada linha de dados
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["id_premio"] . "</td>";
      echo "<td>" . $row["descricao"] . "</td>";
      echo "<td>" . $row["data"] . "</td>";
      echo "<td>" . $row["nome"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='4'>0 resultados</td></tr>";
  }
  ?>
</table>

</body>
</html>

<?php
// Fechar conexão
$conn->close();
?>
