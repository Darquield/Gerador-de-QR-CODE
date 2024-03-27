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

// Consulta SQL para selecionar os dados da tabela equipa_premio
$sql = "SELECT equipa_premio.id_premio, equipa_premio.id_equipas, premio.nome AS nome_premio, 
        equipas.nome AS nome_equipa, premio.data
        FROM equipa_premio
        LEFT JOIN premio ON equipa_premio.id_premio = premio.id_premio
        LEFT JOIN equipas ON equipa_premio.id_equipas = equipas.id_equipas";

$result = $conn->query($sql);

// Inicializa as variáveis de pesquisa
$search = '';
$searchDate = '';

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = $_POST["search"];
  $searchDate = $_POST["searchDate"];
  $search = mysqli_real_escape_string($conn, $search);

  // Consulta SQL usando prepared statements
  $sql = "SELECT equipa_premio.id_premio, equipa_premio.id_equipas, premio.nome AS nome_premio, 
   equipas.nome AS nome_equipa, premio.data
          FROM equipa_premio
          LEFT JOIN premio ON equipa_premio.id_premio = premio.id_premio
          LEFT JOIN equipas ON equipa_premio.id_equipas = equipas.id_equipas
          WHERE equipa_premio.id_premio LIKE ? OR equipa_premio.id_equipas LIKE ?
          OR premio.nome LIKE ? 
          OR equipas.nome LIKE ?
          OR premio.data LIKE ?";

  // Use prepared statement
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sssss", $search, $search, $search, $search, $searchDate);

  // Execute the query
  $stmt->execute();

  // Get the result
  $result = $stmt->get_result();

  // Close the prepared statement
  $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
  }

  h2 {
    color: #333;
  }

  table {
    border-collapse: collapse;
    width: 100%;
  }

  th, td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  tr:hover {
    background-color: #ddd;
  }
   /* Estilo para o formulário de pesquisa */
   form {
        margin-bottom: 20px;
    }

    input[type="text"], input[type="date"] {
        padding: 8px;
        width: 200px;
    }

    button {
        padding: 8px 12px;
        background-color: #ff0000;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
      }

</style>
</head>

<body>

<h2>Dados da Tabela Equipa-Premio</h2>

  <!-- Formulário de pesquisa -->
  <form method="post" action="">
        <input type="text" name="search" placeholder="Pesquisar">
        <input type="date" name="searchDate">
        <button type="submit">Pesquisar</button>
    </form>

<table>
  <tr>
    <th> Nome do Prêmio</th>
    <th>Nome da Equipa Vencedora</th>
    <th>Data do Prêmio</th>
  </tr>
  <?php
  if ($result && $result->num_rows > 0) {
    // Saída de cada linha de dados
    while($row = $result->fetch_assoc()) {
      echo "<tr>";
      echo "<td>" . $row["nome_premio"] . "</td>";
      echo "<td>" . $row["nome_equipa"] . "</td>";
      echo "<td>" . $row["data"] . "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan='3'>0 resultados</td></tr>";
  }
  ?>
</table>

<form action="equipas.php">
  
    <button type="submit">Voltar</button>
</form>

</body>
</html>

<?php
// Fechar conexão
$conn->close();
?>
