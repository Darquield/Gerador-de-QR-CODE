<?php 
include_once('conexao.php');

$queryEquipas = "SELECT e.id_equipas, e.nome, e.descricao, p1.nome AS piloto_principal, p2.nome AS piloto_secundario
                 FROM equipas e
                 LEFT JOIN pilotos p1 ON e.piloto_principal = p1.id_pilotos
                 LEFT JOIN pilotos p2 ON e.piloto_secundario = p2.id_pilotos";

$resultEquipas = $conn->query($queryEquipas);

$queryPilotos = "SELECT * FROM pilotos";
$resultPilotos = $conn->query($queryPilotos);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilotos da Fórmula 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    
</head>
<body>
<header>
<div id="logo"> <a href="index.php"></a>
            

            <a href="index1.php"><img src="./image/PK_white.png" alt="" width="100"> <h1>Fórmula1Passionados</h1></a>
        </div>
        <div id="menu">
            <nav>
            <ul class="nav-list">
                    <li >
                        <a href="index1.php">Página Inicial</a>
                    </li>
                    <li >
                        <a href="equipas1.php">Equipas</a>
                    </li>
                    <li class="first current_page_item">
                        <a href="pilotos1.php">Pilotos</a>
                    </li>
                    <li>
                        <a href="circuitos1.php">Circuitos</a>
                    </li>
                    <li >
                        <a href="loginn.php">Login</a>
                    </li>
                    
                </ul>
            </nav>
    </header>

    <main>
        <!-- Conteúdo sobre pilotos da Fórmula 1 aqui -->
   
        <section id="Atuais Pilotos de 2023"  style="font-size: 34px;" >
            <h2>Pilotos de F1 2023</h2>
           
            <p>Confira a escalação oficial da F1 desta temporada. Análise completa de pilotos, pontos e posições atuais. Siga seus pilotos de F1 favoritos dentro e fora da pista..</p>
           <br>

<?php
if ($resultPilotos->num_rows > 0) {
    while ($row = $resultPilotos->fetch_assoc()) {
        echo '<div class="piloto-info" style="font-size: 24;">';
        echo '<div class="texto-direita">';
        echo '<p>' . $row['descricao'] . '</p>';
        echo '</div>';
        echo '<div class="piloto-nome">' . $row['nome'] . '</div>';
        echo '<div class="piloto-equipe">' . $row['equipe'] . '</div>';
        echo '<div class="piloto-numero">' . $row['numero'] . '</div>';
        echo '<img class="piloto-bandeira" src="image/' . $row['bandeira'] . '" alt="Bandeira do País" width="200">';
        echo "<td><img src='image/" . $row['imagem'] . "' alt='Foto do Piloto'></td>";

        echo '</div>';
        echo '<br>';
    }
} else {
    echo "Não foram encontrados resultados para pilotos.";
}
?>


    <br>
    
   
    
        </div>
    </section>
        
        
    </main>

    <footer>
        &copy; 2023 Fórmula 1
    </footer>
</body>
</html>