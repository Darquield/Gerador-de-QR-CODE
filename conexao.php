<?php

// Informações de conexão com o banco de dados

$servername = "localhost"; // Nome do servidor MySQL

$username = "Wagner"; // Nome de usuário do banco de dados

$password = "123"; // Senha do banco de dados

$database = "pap"; // Nome do banco de dados

 

// Criar uma conexão com o banco de dados

$conn = new mysqli($servername, $username, $password, $database);

 

// Verificar a conexão

if ($conn->connect_error) {

    die("Erro na conexão com o banco de dados: " . $conn->connect_error);

}

 

// Agora você pode executar consultas e operações no banco de dados usando a variável $conn.

?>