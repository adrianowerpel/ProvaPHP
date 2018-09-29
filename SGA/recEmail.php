<?php
/**
 * Created by PhpStorm.
 * User: tassio
 * Date: 08/01/2018
 * Time: 16:21
 */


require "libs/PHPMailer/src/PHPMailer.php";
require "libs/PHPMailer/src/SMTP.php";
require "libs/PHPMailer/src/Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

$mail = new PHPMailer;

$mail->isSMTP();

//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = "tassio@tassio.eti.br";
$mail->Password = "senha";


$mail->setFrom('tassio@tassio.eti.br', 'Tassio Sirqueira');

//$mail->addReplyTo('tassio@tassio.eti.br', 'Tassio Sirqueira');

$mail->addAddress('tmsirqueira@vianna.edu.br', 'Prof. Tassio Sirqueira');

$mail->Subject = 'Recuperação de login SGA';

$mail->msgHTML("Sua senha temporária é 123456 <br> Não perca novamente!");

//$mail->addAttachment('phpmailer.png');

if (!$mail->send()) {
    echo "Erro ao enviar o E-mail: " . $mail->ErrorInfo;
} else {
    echo "E-mail enviado com sucesso!";
}