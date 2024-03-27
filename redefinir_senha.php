<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
       body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-top: 50px;
}

h2 {
    color: #333;
    text-align: center;
}

form {
    margin-top: 30px;
}

label {
    display: block;
    margin-bottom: 9px;
}

input {
    width: 100%;
    padding: 5px; /* Ajuste o valor conforme necessário para diminuir a altura */
    margin-bottom: 11px; /* Ajuste o valor conforme necessário para controlar o espaçamento entre os campos */
}

button {
    background-color: #4CAF50;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

a {
    color: #4CAF50;
    text-decoration: none;
    display: block;
    margin-top: 10px;
    text-align: center;
}

    </style>
    <title>Redefinir Senha</title>
</head>
<body>
    <div class="container">
        <h2>Redefinir Senha</h2>
        <form method="post" action="processar_redefinicao.php">
            <label for="email">Email:</label>
            <input type="text" name="email" required>

            <label for="novaSenha">Nova Senha:</label>
            <input type="password" name="novaSenha" required>

            <label for="confirmarSenha">Confirmar Nova Senha:</label>
            <input type="password" name="confirmarSenha" required>

            <button type="submit">Redefinir Senha</button>
        </form>

        <a href="loginn.php">Voltar para o Login</a>
    </div>
</body>
</html>
