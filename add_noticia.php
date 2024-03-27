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

// Adicionar notícia ao banco de dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descricao = $_POST["descricao"];
    $data_publicacao = $_POST["data_publicacao"];

    // Verificar se uma imagem foi enviada
    if (isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_size = $_FILES['image']['size'];

        // Diretório de destino
        $target_dir = "uploads/";

        // Certifique-se de que o diretório existe
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Caminho completo do arquivo de destino
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        // Verifique o tipo de arquivo (pode adicionar mais tipos se necessário)
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_types)) {
            move_uploaded_file($file_tmp, $target_file);
            $foto = basename($_FILES["image"]["name"]);

            // Instrução preparada para evitar injeção SQL
            $stmt = $conn->prepare("INSERT INTO Noticias (titulo, descricao, data_publicacao, foto) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $titulo, $descricao, $data_publicacao, $foto);

            if ($stmt->execute()) {
                echo "Notícia adicionada com sucesso!";
            } else {
                echo "Erro ao adicionar notícia: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Erro: Apenas arquivos de imagem são permitidos (jpg, jpeg, png, gif).";
        }
    } else {
        echo "Erro: Nenhuma imagem enviada.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Notícia</title>
</head>
<style>

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
textarea,
input[type="date"],
input[type="file"] {
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

<h2>Adicionar Notícia</h2>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>" enctype="multipart/form-data">
    Título: <input type="text" name="titulo" required><br>
    Descrição: <textarea name="descricao" rows="4" required></textarea><br>
    Data de Publicação: <input type="date" name="data_publicacao" required><br>
    Foto: <input type="file" name="image" accept="image/*" required><br>

    <input type="submit" value="Adicionar Notícia">
</form>
<form action="pagina_admin.php">
    <button type="submit">Voltar</button>
</form>

</body>
</html>
