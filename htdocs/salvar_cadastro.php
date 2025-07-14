<?php
// Recebe os dados do formulário
$nome = trim($_POST['nome']);
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

// Validação simples
if (empty($nome) || empty($email) || empty($senha)) {
    header("Location: cadastro.html?error=Preencha todos os campos!");
    exit();
}

// Criptografa a senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Simula salvando os dados em um arquivo txt
$linha = "$nome|$email|$senha_hash\n";
file_put_contents('usuarios.txt', $linha, FILE_APPEND);

// Redireciona para a página de sucesso
header("Location: sucesso.php");
exit();
?>
