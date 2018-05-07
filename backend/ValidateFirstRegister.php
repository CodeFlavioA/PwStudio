<?php
    include 'databasecon.php';
	if(isset($_REQUEST["ok"])){
        if(isset( $_POST["FullName"])){
            if(isset($_POST["email"])){
                $NOMBRE = $_POST["FullName"];
                $Email = $_POST["email"];
                $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
                $numerodeletras=35; //numero de letras para generar el texto
                $cadena = ""; //variable para almacenar la cadena generada
                for($i=0;$i<$numerodeletras;$i++)
                {
                    $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
                     entre el rango 0 a Numero de letras que tiene la cadena */
                }
                if($Cx){
                    $Query = "INSERT INTO usuarios (Nombres,keyrandom,password,validado,ID) VALUES('$NOMBRE','$cadena','','','','')";
                    if(mysqli_query($Cx,$Query)){
                        session_start();
                        $_SESSION["NOTIFY"] = "Se le ha enviado un correo con informacion para activar su cuenta";
                        header("location: ../../NotificacionesArea.php");
                    }

                }


            }
        }
    }

?>