<?php

include_once "privatekey.php";

function GetRegisterKey($user){
    GetPrivateKey($user)    ;
}

function getInitialVector($user){

}

function SaveDataAccounts($d,$c,$a,$b){
    //ENCRIPTAR LOS DATOS PRIMERO
    include_once "databasecon.php";
    require_once "Encrypt.php";
    $key = GetRegisterKey($c);
    $a = encrypt($a,$key,$c);
    $b = encrypt($b,$key,$c);
    $d = encrypt($d,$key,$c);
    $Query = "INSERT INTO cuentas (tipocuenta,usuario,cuenta,idcuenta,pass) VALUES ('$d','$c','$a','','$b')";
    if(mysqli_query($Cx,$Query)){
        header("location: ../PartyHard/");
    }
            
}

function DeleteDataAccount($user,$id){
    include 'databasecon.php'    ;
    $Query = "DELETE FROM cuentas WHERE idcuenta = '$id'";
    if(mysqli_query($Cx,$Query)){
        header("location: ../PartyHard/");
    }

    
}

?>