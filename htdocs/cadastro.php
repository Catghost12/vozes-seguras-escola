<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Cadastro - Vozes Seguras</title>
  <link rel="stylesheet" href="Assets/CSS/estilo.css">
</head>
<body>
  <h1>Cadastro</h1>
  <p><!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Cadastro de Usuário</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(120deg, #89f7fe, #66a6ff);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0;
    }
    .container {
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
      width: 350px;
      text-align: center;
    }
    .container h2 {
      color: #333;
      margin-bottom: 20px;
    }
    .container input {
      width: 100%;
      padding: 12px;
      margin: 10px 0;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 14px;
    }
    .container button {
      width: 100%;
      padding: 12px;
      background-color: #66a6ff;
      border: none;
      color: white;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }
    .container button:hover {
      background-color: #4e8cff;
    }
    .error {
      color: red;
      font-size: 14px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Cadastro</h2>
    <form action="salvar_cadastro.php" method="POST">
      <input type="text" name="nome" placeholder="Nome completo" required />
      <input type="email" name="email" placeholder="E-mail" required />
      <input type="password" name="senha" placeholder="Senha" required />
      <button type="submit">Cadastrar</button>
    </form>
    <?php
      if (isset($_GET['error'])) {
        echo '<p class="error">'.htmlspecialchars($_GET['error']).'</p>';
      }
    ?>
  </div>
</body>
</html>
