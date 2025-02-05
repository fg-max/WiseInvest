<?php
// Conexão com o banco de dados (substitua com suas credenciais)
$con = mysqli_connect("localhost", "id22131576_wise_invest", "caNNabis420.", "id22131576_wise_invest");

// Verifica se houve falha na conexão
if (mysqli_connect_errno()) {
    echo "Falha na conexão com o banco de dados: " . mysqli_connect_error();
    exit();
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $query = "SELECT * FROM TB_USUARIO WHERE EMAIL_USUARIO = '$email'";
    $result = mysqli_query($con, $query);

    // Gera um código de recuperação temporário
    $codigo = uniqid();

    // Prepara o e-mail
    $assunto = "Recuperação de Senha";
    $mensagem = "Olá,\n\nVocê solicitou a recuperação de senha. Clique no link abaixo para redefinir sua senha:\n\n";
    $mensagem .= "https://seu-site.com/redefinir_senha.php?email=" . urlencode($email) . "&codigo=" . urlencode($codigo) . "\n\n";
    $mensagem .= "Se não foi você quem solicitou essa recuperação, por favor, ignore este e-mail.\n\n";
    $mensagem .= "Atenciosamente,\nSua Empresa";
    $headers = "From: seu_email@seudominio.com";

    // Envio do e-mail
    if (mail($email, $assunto, $mensagem, $headers)) {
        echo "Um e-mail com instruções de recuperação foi enviado para o seu endereço.";
    } else {
        echo "Erro ao enviar e-mail de recuperação. Por favor, tente novamente mais tarde.";
    }
}

// Fechar conexão com o banco de dados
mysqli_close($con);
?>
