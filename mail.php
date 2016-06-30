<?php
require_once 'plugins/php-aws-ses/SimpleEmailServiceMessage.php';
require_once 'plugins/php-aws-ses/SimpleEmailService.php';
require_once 'plugins/php-aws-ses/SimpleEmailServiceRequest.php';

error_reporting(E_ALL);

$mail = new SimpleEmailServiceMessage();
$mail->addTo('luis.quinones@ingeniocontenido.co');
$mail->setFrom($_POST['correo']);
$mail->setSubject('Contacto desde Coljoyas');
$body = $_POST['comentarios']."<br /><br />"."Celular: <strong>".$_POST['telefono']."</strong>";
$mail->setMessageFromString($body);

//$region_endpoint = SimpleEmailService::AWS_US_EAST_1;
$ses = new SimpleEmailService('AKIAIDECUS4A6572LNOA', 'An1o29NfX3UM/6sHzzZzLtBAMjNTRQefnjLRmw8YFJS4');
$ses->sendEmail($mail);

header('Location: index.php?estado=sent');
/*require_once('plugins/phpmailer/class.phpmailer.php');
$mail = new PHPMailer(true);

//Luego tenemos que iniciar la validación por SMTP:

    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = "ssl://email-smtp.us-east-1.amazonaws.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
    $mail->Username = "AKIAIDECUS4A6572LNOA"; // Correo completo a utilizar
    $mail->Password = "An1o29NfX3UM/6sHzzZzLtBAMjNTRQefnjLRmw8YFJS4"; // Contraseña
    $mail->Port = 587; // Puerto a utilizar


    //Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
    $mail->From = $_POST['correo']; // Desde donde enviamos (Para mostrar)
    $mail->FromName = $_POST['nombre'];


    //Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: ?From: Nombre <correo@dominio.com>?) de //correo.
    $mail->AddAddress("luis.quinones@ingeniocontenido.co"); // Esta es la dirección a donde enviamos
    $mail->IsHTML(true); // El correo se envía como HTML
    $mail->Subject = "Contacto desde Coljoyas"; // Este es el titulo del email.


    $body = $_POST['comentarios']."<br /><br />".
    $body .= "Celular: <strong>".$_POST['telefono']."</strong>";

    $mail->Body = $body; // Mensaje a enviar
    $mail->Send(); // Envía el correo.



//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
    echo 'El correo fue enviado correctamente.';
}else{
    echo 'Hubo un inconveniente. Contacta a un administrador.';
}*/