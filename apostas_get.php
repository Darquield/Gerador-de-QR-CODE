<?php
session_start();
// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "Wagner";
$password = "123";
$dbname = "pap";

// Criar uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}

// Consulta SQL para buscar dados das apostas
$sql = "SELECT piloto_escolhido, COUNT(*) as num_apostas FROM apostas GROUP BY piloto_escolhido";
$result = $conn->query($sql);
$dadosApostas = array();

while($row = $result->fetch_assoc()) {
    $dadosApostas[] = array(
        'piloto' => $row['piloto_escolhido'],
        'num_apostas' => $row['num_apostas']
    );
}

// Encode os dados em formato JSON e retorne
echo json_encode($dadosApostas);

// Feche a conexão com o banco de dados
$conn->close();
?>
