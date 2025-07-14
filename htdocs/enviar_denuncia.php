<?php
// Destinatário
$destinatario = "appvozesseguras12@gmail.com";

// Dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : 'Anônimo';
$email = isset($_POST['email']) ? $_POST['email'] : 'Não informado';
$mensagem = isset($_POST['mensagem']) ? $_POST['mensagem'] : '';

// Assunto e corpo do e-mail
$assunto = "Nova denúncia recebida pelo site";

$corpoEmail = "=== NOVA DENÚNCIA ===\n";
$corpoEmail .= "Nome: $nome\n";
$corpoEmail .= "E-mail: $email\n";
$corpoEmail .= "Mensagem:\n$mensagem\n";
$corpoEmail .= "=====================\n";

// Cabeçalhos do e-mail
$cabecalhos = "From: noreply@seudominio.com\r\n";
$cabecalhos .= "Reply-To: $email\r\n";
$cabecalhos .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envia o e-mail
if (mail($destinatario, $assunto, $corpoEmail, $cabecalhos)) {
    // Redireciona para a página de sucesso
    header("Location: sucesso.html");
    exit();
} else {
    echo "Erro ao enviar a denúncia. Tente novamente mais tarde.";
}
?>
