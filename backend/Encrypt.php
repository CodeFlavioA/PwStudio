<?php
    require_once "libs/sodium_compat/autoload.php";
    function encrypt($string,$key,$iv){
        $iv = substr($iv,0,16);
        $key = substr($key,0,32);
            return (openssl_encrypt($string, 'aes-256-cbc', $key, 0, $iv));
    }

    function decrypt($string,$key,$iv){
        $iv = substr($iv,0,16);
        $key = substr($key,0,32);
            $dc=  openssl_decrypt($string, 'aes-256-cbc', $key, 0,$iv);
            return $dc; 
    }
    
    function generateRandomChar(){
        $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
        $numerodeletras=16; //numero de letras para generar el texto
        $cadena = ""; //variable para almacenar la cadena generada
        for($i=0;$i<$numerodeletras;$i++)
        {
            $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); /*Extraemos 1 caracter de los caracteres 
                entre el rango 0 a Numero de letras que tiene la cadena */
        }
    }

?>