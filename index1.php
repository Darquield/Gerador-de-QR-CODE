<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Inicial </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
    
</head>
<body>

<header>
    <div id="logo">
        <a href="index1.php"><img src="./image/PK_white.png" alt="" width="100">
            <h1>Fórmula1Passionados</h1>
        </a>
    </div>
    <div id="menu">
        
        <nav>
            <ul class="nav-list">
                <li class="first current_page_item">
                    <a href="index1.php">Página Inicial</a>
                </li>
                <li>
                    <a href="equipas.php">Equipas</a>
                </li>
                <li>
                    <a href="pilotos.php">Pilotos</a>
                </li>
                <li>
                    <a href="circuitos.php">Circuitos</a>
                </li>
                <li>
                    <a href="Apostas.php">Apostas</a>
                </li>
                <li>
                    <a href="perfil.php">Sair</a>
                </li>
            </ul>
        </nav>
    </div>
 

</header>


<?php
// Conexão com o banco de dados (substitua pelos seus próprios dados)
$servername = "localhost";
$username = "Wagner";
$password = "123";
$dbname = "pap";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultar notícias do banco de dados
$sql = "SELECT * FROM Noticias ORDER BY data_publicacao DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="noticia-container">';
        echo '<div class="noticia-box">';
        echo '<div class="noticia-info">';
        echo "<h2>" . $row["titulo"] . "</h2>";
        echo "<p><strong>Data de Publicação:</strong> " . $row["data_publicacao"] . "</p>";
        echo "<p>" . $row["descricao"] . "</p>";
        $imagemPath = 'image/' . $row['foto'];
        if (file_exists($imagemPath)) {
            echo '<img width="250" src="' . $imagemPath . '">';
        } else {
            echo '<p>Imagem não encontrada</p>';
        }
    }
} else {
    echo "Nenhuma notícia encontrada.";
}

$conn->close();
?>






</body>
</html>
