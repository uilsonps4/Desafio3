<?php


$nome = utf8_encode ($_POST['nome']);
$cpf = utf8_encode ($_POST['cpf']);
$email = utf8_encode ($_POST['email']);
$mensagem = utf8_encode ($_POST['mensagem']);

require 'PHPMailer/PHPMailerAutoload.php'


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

$mail->setFrom($mail->Username,"Uilson Souza"); //Remetente
$mail->addAddress ('uilsonps4@gmail.com'); //Destinatário
$mail->Subject = "Fale com Conosco"; //Assunto do E-mail


$conteudo_email = "Você recebu uma mensagem de $nome com o registro $cpf ($email)
<br><br>
mensagem:<br>
$mensagem";

$mail->IsHTML(true);
$mail->Body = $conteudo_email;

if ($mail->send('')) {
    echo "E-mail enviado com sucesso!";

} else {

    echo "Falha no envio! " . $mail->ErrorInfo;
}