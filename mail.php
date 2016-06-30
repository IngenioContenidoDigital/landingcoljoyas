<?php
require("./plugins/phpmailer/class.phpmailer.php");
$mail = new PHPMailer();

//Luego tenemos que iniciar la validación por SMTP:
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "tls";
$mail->Host = "email-smtp.us-east-1.amazonaws.com"; // SMTP a utilizar. Por ej. smtp.elserver.com
$mail->Username = "AKIAIDECUS4A6572LNOA"; // Correo completo a utilizar
$mail->Password = "An1o29NfX3UM/6sHzzZzLtBAMjNTRQefnjLRmw8YFJS4"; // Contraseña
$mail->Port = 465; // Puerto a utilizar


//Con estas pocas líneas iniciamos una conexión con el SMTP. Lo que ahora deberíamos hacer, es configurar el mensaje a enviar, el //From, etc.
$mail->From = $_POST['correo']; // Desde donde enviamos (Para mostrar)
$mail->FromName = $_POST['nomre'];

//Estas dos líneas, cumplirían la función de encabezado (En mail() usado de esta forma: ?From: Nombre <correo@dominio.com>?) de //correo.
$mail->AddAddress("luis.quinones@ingeniocontenido.co"); // Esta es la dirección a donde enviamos
$mail->IsHTML(true); // El correo se envía como HTML
$mail->Subject = "Contacto desde Coljoyas"; // Este es el titulo del email.
$body = $_POST['comentarios']."<br /><br />";
$body .= "Celular: <strong>".$_POST['celular']."</strong>";
$mail->Body = $body; // Mensaje a enviar
$exito = $mail->Send(); // Envía el correo.

//También podríamos agregar simples verificaciones para saber si se envió:
if($exito){
    echo 'El correo fue enviado correctamente.';
}else{
    echo 'Hubo un inconveniente. Contacta a un administrador.';
}