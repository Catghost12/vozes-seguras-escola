<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario'])) {
    header("Location: login.html?error=Você precisa fazer login primeiro!");
    exit();
}

$nomeUsuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Painel do Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(120deg, #cfd9df, #e2ebf0);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      width: 400px;
      text-align: center;
    }
    .container h1 {
      color: #333;
    }
    .container a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background: #66a6ff;
      color: #fff;
      border-radius: 5px;
      text-decoration: none;
    }
    .container a:hover {
      background: #4e8cff;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bem-vindo, <?php echo htmlspecialchars($nomeUsuario); ?>!</h1>
    <p>Você está logado no sistema.</p>
    <a href="logout.php">Sair</a>
  </div>
</body>
</html>
