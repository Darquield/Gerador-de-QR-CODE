<?php
include_once('conexao.php');

$queryEquipas = "SELECT e.id_equipas, e.nome, e.descricao, e.foto, p1.nome AS piloto_principal, p2.nome AS piloto_secundario
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
    <title>Equipes da Fórmula 1</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
    
    <div id="logo">
        <a href="index1.php"><img src="./image/PK_white.png" alt="" width="100"> <h1>Fórmula1Passionados</h1></a>
    </div>
    <div id="menu">
        <nav>
            <ul class="nav-list">
                <li>
                    <a href="index.php">Página Inicial</a>
                </li>
                <li class="first current_page_item">
                    <a href="equipas1.php">Equipas</a>
                </li>
                <li>
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
        

        <?php
        if ($resultEquipas->num_rows > 0) {
            echo "<ul>";
            while ($row = $resultEquipas->fetch_assoc()) {
                echo "<h2>" . $row['nome'] . "</h2>";
                echo "<p>" . $row['descricao'] . "</p>";
                echo "<p>Piloto Principal: " . $row['piloto_principal'] . "</p>";
                echo "<p>Piloto Secundário: " . $row['piloto_secundario'] . "</p>";

                $imagemPath = 'image/' . $row['foto'];
                if (file_exists($imagemPath)) {
                    echo '<img width="300" src="' . $imagemPath . '">';
                } else {
                    echo '<p>Imagem não encontrada</p>';
                }
            }
            echo "</ul>";
        } else {
            echo "Não foram encontrados resultados para equipas.";
        }
        ?>
    </main>

    <footer>
        &copy; 2023 Fórmula 1
    </footer>
</body>
</html>
