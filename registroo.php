<!DOCTYPE html>
<html lang="pt-pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.w.css">
    <title>Registo</title>
</head>
<body>
    <div class="login-box"> <!-- Aplicando a classe login-box ao elemento principal -->
        <form action="registro.php" method="POST">
            <p>Registar-se</p>
            <div class="user-box">
                <input type="text" name="nome" placeholder="Full Name">
                <label>Nome Completo</label> <!-- Adicionei uma label para manter a estrutura do CSS -->
            </div>
            <div class="user-box">
                <input type="email" name="email" placeholder="Email">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="senha" placeholder="Password">
                <label>Senha</label>
            </div>
            <div class="user-box">
                <input type="password" name="confirmaSenha" placeholder="Confirmar Password">
                <label>Confirmar Senha</label>
            </div>
            <button type="submit">Registar</button>
        </form>
        <a href="loginn.php" class="a2">Já tens conta?</a>
    </div>
</body>
</html>
