<?php


$nome = utf8_encode($_POST['name']);
$cpf = utf8_encode($_POST['cpf']);
$email = utf8_encode($_POST['email']);
$mensagem = utf8_encode($_POST['mensagem']);

require 'PHPMailer/PHPMailerAutoload.php';


$mail = new PHPMailer;
$mail->isSMTP();

//Configurações do Servidor de email

$mail->Host = "smtp.gmail.com";
$mail->Port = "587";
$mail->SMTPSecure = "tls";
$mail->SMTPAuth = "true";
$mail->Username = "uilsonps4@gmail.com";
$mail->Password = "Junior123";

//Configuração da mensagem

$mail->setFrom($mail->Username,"uilsonsouzaphp@gmail.com"); //Remetente
$mail->addAddress (''); //Destinatário
$mail->Subject = "Fale com Conosco"; //Assunto do E-mail


$conteudo_email = "
Eu Passei no teste ? 
$nome $email ($cpf):<br><br>

Mensagem:<br>
$mensagem
";

$mail->IsHTML(true);
$mail->body = $conteudo_email;

if ($mail->send()) {
    echo "E-mail enviado com sucesso!";

} else {

    echo "Falha no envio! " . $mail->ErrorInfo;
}
