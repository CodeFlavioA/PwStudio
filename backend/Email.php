<?php
try {
    require "libs/PHPMailer-master/src/PHPMailer.php";
    require "libs/PHPMailer-master/src/SMTP.php";
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    //Luego tenemos que iniciar la validación por SMTP:
    $mail->IsSMTP();
    echo "ok1";
    $mail->SMTPAuth = true;
    $mail->Host = "smtp.gmail.com"; // A RELLENAR. Aquí pondremos el SMTP a utilizar. Por ej. mail.midominio.com
    $mail->Username = "pwstudio.blue@gmail.com"; // A RELLENAR. Email de la cuenta de correo. ej.info@midominio.com La cuenta de correo debe ser creada previamente. 
    $mail->Password = "mangui24"; // A RELLENAR. Aqui pondremos la contraseña de la cuenta de correo
    echo "ok2";
    $mail->SMTPSecure = 'tls';   
    $mail->Port = 587; // Puerto de conexión al servidor de envio. 
    $mail->From = "pwstudio.blue@gmail.com"; // A RELLENAR Desde donde enviamos (Para mostrar). Puede ser el mismo que el email creado previamente.
    $mail->FromName = "Blue Labs Studio - PwStudio"; //A RELLENAR Nombre a mostrar del remitente. 
    echo "ok3";
    $mail->AddAddress($Email); // Esta es la dirección a donde enviamos 
    $mail->IsHTML(true); // El correo se envía como HTML 
    $mail->Subject = "COMPLETA TU REGISTRO"; // Este es el titulo del email. 
    $body = "Completa tu registro
    http://localhost/StudioPass/LabFinal/backend/Registro.php?xtka=$cadena&xtyb=777&xtya=2"; 
    echo "ok4";
    $mail->Body = $body; // Mensaje a enviar. $exito = $mail->Send(); // Envía el correo.
    #if($mail->send()){ 
        echo "ok5";
    if($mail->send()){ 
        header("location: ../PreParty/Notify/");
    }
} catch (Exception $e){
        echo " No envio:". $mail->ErrorInfo;
    } 
?>