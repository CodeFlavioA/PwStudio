<?php

include_once "privatekey.php";

function GetRegisterKey($user){
    GetPrivateKey($user)    ;
}

function getInitialVector($user){

}

function SaveDataAccounts($d,$c,$a,$b){
    //ENCRIPTAR LOS DATOS PRIMERO
    require_once "Encrypt.php";
    $key = GetRegisterKey($c);
    $a = encrypt($a,$key,$c);
    $b = encrypt($b,$key,$c);
    $d = encrypt($d,$key,$c);
    $Cx = mysqli_connect("localhost","root","","bluelabs");
    $Query = "INSERT INTO cuentas (tipocuenta,usuario,cuenta,idcuenta,pass) VALUES ('$d','$c','$a','','$b')";
    if(mysqli_query($Cx,$Query)){
        header("location: ../PartyHard/");
    }
            
}

function DeleteDataAccount($user,$id){
    $Cx = mysqli_connect("localhost","root","","bluelabs"); 
    $Query = "DELETE FROM cuentas WHERE idcuenta = '$id'";
    if(mysqli_query($Cx,$Query)){
        header("location: ../PartyHard/");
    }

    
}

?>