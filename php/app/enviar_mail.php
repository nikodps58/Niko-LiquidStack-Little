<?php


/* 01 RECOGEMOS DATOS DEL FORMULARIO ENVIADOS POR POST  */
$nombre = $_POST["nombre"];
$email = $_POST["email"];

date_default_timezone_set("Europe/Madrid");
$fecha = date("Y-m-d H:m:s");

$ip = $_SERVER["REMOTE_ADDR"];


/* 02 HACEMOS COMPROBACIONES */
if(empty($nombre)){
    header("location:".$_ENV['RAIZ'].'/');
    die;
}
if(empty($email)){
    header("location:".$_ENV['RAIZ'].'/');
    die;
}

/* CONSTRUIMOS EL CONTENIDO DEL CORREO */

/* 03 DAMOS VALOR A LAS VARIABLES USADAS EN PHPMAILER Y EJECUTAMOS PHPMAILER PARA QUE ENVÍE EL CORREO */
/* el correo al usuario que ha escrito la consulta */
$correoEmisor = "info@webda.eus";
$nombreEmisor = "Webda - Igor";
$destinatario = $email;
$nombreDestinatario = $nombre;
$asunto = "Hemos recibido tu consulta, ". $nombre;
$cuerpo = '
<html> 
    <head> 
        <title>'.$asunto.'</title>
    </head> 
    <body style="font-family:Arial; font-size:18px;">
        <div style="text-align:center;width:100%;padding:50px;height:500px;background-image:url(\'cid:fondo\');background-size:cover;">
            <a href="https://isar-electricidad.com" target="_blank"><img src="cid:logotipo" style="width: 150px;"></a>    
            <h1 style="font-size:50px;color:orange;">Hola, '.$nombre.'!</h1>
            <p style="font-size:40px;">Gracias por ponerte en contacto con nosotros</p>               
        </div>
        <div style="padding-left: 50px;padding-top: 50px;">
            <p>Hemos recibido de forma satisfactoria tus datos de contacto. Recuerda que sólo los usaremos para ponernos en contacto contigo.</p>
            <ul>
                <li><b>Nombre:</b> '.$nombre.'</li>
                <li><b>Correo electrónico:</b> '.$email.'</li>
                <li><b>Hora y fecha:</b> '.$fecha.'</li>
            </ul>
            
            <p style="margin-top: 100px;">En breve nos pondremos en contacto contigo. Eskerrik Asko!</p>
            <p><i>Equipo de Área</i></p> 
        </div>                
    </body> 
</html>';
include "./config_phpMailer.php";

/* el correo que recibe el webmaster */
$correoEmisor = "info@webda.eus";
$nombreEmisor = "Webda - Igor";
$destinatario = "aranaz@webda.eus";
$nombreDestinatario = "Webmaster";
$asunto = "El usuario, $nombre, se ha suscrito en la web";
$cuerpo = '
<html> 
    <head> 
        <title>'.$asunto.'</title>
    </head> 
    <body style="font-family:Arial; font-size:18px;">
        <div style="text-align:center;width:100%;padding:50px;height:500px;background-image:url(\'cid:fondo\');background-size:cover;">
            <a href="https://isar-electricidad.com" target="_blank"><img src="cid:logotipo" style="width: 150px;"></a>    
            <h1 style="font-size:50px;color:orange;">Hola, webmaster!</h1>
            <p style="font-size:40px;">Ha habido una nueva suscripción</p>               
        </div>
        <div style="padding-left: 50px;padding-top: 50px;">
            <p>Estos son los datos del suscriptor:</p>
            <ul>
                <li><b>Nombre:</b> '.$nombre.'</li>
                <li><b>Correo electrónico:</b> '.$email.'</li>
                <li><b>Hora y fecha:</b> '.$fecha.'</li>
            </ul>
            
            <p style="margin-top: 100px;">En breve nos pondremos en contacto contigo. Eskerrik Asko!</p>
            <p><i>Equipo de Área</i></p> 
        </div>                
    </body> 
</html>';
include "./config_phpMailer.php";


/* 06 redirigir a la página de inicio con variable GET de todo ok */
/* ENVIAMOS DOS VARIABLES POR GET: v con un "ok" y n con el nombre del usuario que ha enviado la consulta */

header("location:".$_ENV['RAIZ'].'/es/gracias-por-tu-registro');

?>