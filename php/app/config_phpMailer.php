<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;  
require '../../vendor/autoload.php'; /* modificar */
  
$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();
    $mail->Host='webda-eus.correoseguro.dinaserver.com'; /* modificar */                
    $mail->SMTPAuth = true;                        
    $mail->Username = 'info@webda.eus'; /* modificar */              
    $mail->Password = '****'; /* modificar */                       
    $mail->SMTPSecure = 'ssl';                              
    $mail->Port = 465;  
  
    $mail->setFrom($correoEmisor, $nombreEmisor); //varibles
    $mail->addAddress($destinatario, $nombreDestinatario); //varibles
    /* $mail->addCC('info@webda.eus');//copia
    $mail->addBCC('info@webda.eus');//copia oculta */
       
    $mail->isHTML(true);
    $mail->CharSet = PHPMailer::CHARSET_UTF8;                    
    $mail->Subject = $asunto; //varibles
    $mail->Body = $cuerpo;
    $mail->AddEmbeddedImage('../../assets/img/isar_logo_light(200x200).png', 'logotipo', 'isar_logo_light(200x200).png');
    $mail->AddEmbeddedImage('../../assets/img/conectados_1400w.jpg', 'fondo', 'conectados_1400w.jpg');
    $mail->AltBody = 'Body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
        die;
    } else {
        //echo $aviso; //SACAMOS AVISO EN LA WEB DEL ENVÍO DEL CORREO
    }
    
} catch (Exception $e) {
    echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
    die;
}
  
?>