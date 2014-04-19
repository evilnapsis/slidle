<?php
$to      = 'evilnapsis@gmail.com';
$subject = 'Invitacion a Slidle';
$message = '<h1>Bienvenido a slidle</h1><p>tu amigo sebastiasn ramos te ha enviado una invitacion para que te unas a slidle. <a href="http://slidle.com">Click aqui</a></p>';
//$message = 'hola';

$headers = 'From: no-reply@slidle.com' . "\r\n" .
    'Reply-To: no-reply@slidle.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion().
	"Content-type: text/html; charset=iso-8859-1"
    ;

mail($to, $subject, $message, $headers);
?> 