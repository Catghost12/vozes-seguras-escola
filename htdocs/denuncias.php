<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aba de Denúncias</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: #f2f4f8;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: flex-start;
      min-height: 100vh;
    }

    .container {
      background: #fff;
      margin-top: 50px;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    h2 {
      text-align: center;
      color: #333;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      margin-top: 15px;
      display: block;
      color: #555;
    }

    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 12px;
      border-radius: 5px;
      border: 1px solid #ccc;
      margin-top: 5px;
      box-sizing: border-box;
      font-size: 14px;
    }

    textarea {
      height: 100px;
      resize: vertical;
    }

    .checkbox-container {
      margin-top: 15px;
      display: flex;
      align-items: center;
    }

    .checkbox-container input {
      margin-right: 10px;
    }

    #dadosPessoais {
      margin-top: 10px;
    }

    button {
      margin-top: 25px;
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 5px;
      background-color: #1e90ff;
      color: white;
      font-size: 16px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #0077cc;
    }

    .success-message {
      margin-top: 15px;
      text-align: center;
      color: green;
    }
  </style>
</head>
<body>

  <div class="container">
    <h2>Enviar Denúncia</h2>
    <form id="denunciaForm">
      <label for="titulo">Título da denúncia</label>
      <input type="text" id="titulo" name="titulo" required>

      <label for="descricao">Descrição</label>
      <textarea id="descricao" name="descricao" required></textarea>

      <div class="checkbox-container">
        <input type="checkbox" id="anonimo" name="anonimo" checked>
        <label for="anonimo">Enviar anonimamente</label>
      </div>

      <div id="dadosPessoais" style="display:none;">
        <label for="nome">Nome (opcional)</label>
        <input type="text" id="nome" name="nome">

        <label for="email">Email (opcional)</label>
        <input type="email" id="email" name="email">
      </div>

      <button type="submit">Enviar denúncia</button>
      <div class="success-message" id="successMsg"></div>
    </form>
  </div>

  <script>
    const anonimoCheckbox = document.getElementById('anonimo');
    const dadosPessoaisDiv = document.getElementById('dadosPessoais');
    const successMsg = document.getElementById('successMsg');

    anonimoCheckbox.addEventListener('change', () => {
      dadosPessoaisDiv.style.display = anonimoCheckbox.checked ? 'none' : 'block';
    });

    document.getElementById('denunciaForm').addEventListener('submit', async (e) => {
      e.preventDefault();
      const data = {
        titulo: document.getElementById('titulo').value,
        descricao: document.getElementById('descricao').value,
        anonimo: document.getElementById('anonimo').checked,
        nome: document.getElementById('nome').value,
        email: document.getElementById('email').value
      };

      try {
        await fetch('/enviar-denuncia', {
          method: 'POST',
          headers: { 'Content-Type': 'application/json' },
          body: JSON.stringify(data)
        });

        successMsg.textContent = "Denúncia enviada com sucesso!";
        document.getElementById('denunciaForm').reset();
        dadosPessoaisDiv.style.display = 'none';
        setTimeout(() => successMsg.textContent = "", 5000);
      } catch (err) {
        successMsg.textContent = "Erro ao enviar denúncia. Tente novamente.";
        successMsg.style.color = "red";
      }
    });
  </script>

</body>
</html>