<?php
session_start(); // Inicie a sessão, se ainda não tiver sido iniciada

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o valor do piloto escolhido do formulário
    $pilotoEscolhido = $_POST["pilotoEscolhido"];
    $user_id = $_SESSION['user_id']; // Obtenha o ID do usuário da sessão

    // Obtenha os dados do perfil
    $sql_utilizador = "SELECT * FROM usuarios WHERE id = $user_id";
    $utilizador = $conn->query($sql_utilizador);
    $row = $utilizador->fetch_assoc(); // Obtém os dados do perfil do usuário

    $dataAposta = date("Y-m-d H:i:s"); // Obtém a data e hora atuais

    // Insira os dados na tabela do banco de dados
    $sql = "INSERT INTO apostas (nome_usuario, piloto_escolhido, data_aposta, id_utilizador) VALUES ('{$row['nome']}', '$pilotoEscolhido', '$dataAposta', $user_id)";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Aposta registrada com sucesso.'); window.location.href='Apostas.php'</script>";
    } else {
        echo "Erro ao registrar a aposta: " . $conn->error;
    }
} else {
    echo "Erro: Formulário não foi submetido.";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
