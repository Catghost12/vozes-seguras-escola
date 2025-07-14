<?php
session_start();

// Dados do formulário
$email = trim($_POST['email']);
$senha = trim($_POST['senha']);

// Verifica se o arquivo de usuários existe
if (!file_exists('usuarios.txt')) {
    header("Location: login.php?error=Nenhum usuário cadastrado ainda!");
    exit();
}

// Abre o arquivo de usuários
$usuarios = file('usuarios.txt');

// Procura o e-mail e verifica a senha
$loginValido = false;
$nomeUsuario = "";

foreach ($usuarios as $usuario) {
    list($nome, $emailSalvo, $senhaHash) = explode('|', trim($usuario));

    if ($email === $emailSalvo && password_verify($senha, $senhaHash)) {
        $loginValido = true;
        $nomeUsuario = $nome;
        break;
    }
}

if ($loginValido) {
    // Cria sessão para o usuário logado
    $_SESSION['usuario'] = $nomeUsuario;
    header("Location: dashboard_login.php");
    exit();
} else {
    header("Location: login.html?error=E-mail ou senha inválidos!");
    exit();
}
?>
