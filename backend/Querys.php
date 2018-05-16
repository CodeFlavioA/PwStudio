<?php

include_once "privatekey.php";

function GetRegisterKey($user){
    GetPrivateKey($user);
}

function getInitialVector($c){
    
}

function getDataByEmail($c){
    $Query = "SELECT * FROM cuentas WHERE Email = $c";
    $reg = DoQuery($Query);
    if($reg!=false){
        return $reg; 
    }else{
        return false; 
    }
}

function getDataByRegisterKey($c){
    $Query = "SELECT * FROM cuentas WHERE RegisterKey = '$c'";
    $reg = DoQuery($Query);
    if($reg!=false){
        return $reg; 
    }else{
        return false; 
    }
}

function getRegisterKeyByUser($c){
    $Query = "SELECT RegisterKey FROM usuarios WHERE Email = '$c'";
    $reg = DoQuery($Query);
    if($reg!=false){
        $line = mysqli_fetch_array($reg)[0];
        return $line; 
    }else{
        return false; 
    }
}

function addPhrase($a,$b){
    date_default_timezone_set('UTC');
    $date = date("m.d.y"); 
    $Query = "INSERT INTO tools VALUES ('$a','$b','$date','')";
    DoQuery($Query);
}

function DoQuery($Q){
    include_once 'databasecon.php';
    $Cx = mysqli_connect("localhost","root","","bluelabs");
    if($reg=mysqli_Query($Cx,$Q)){
            return $reg; 
    }else{
            echo mysqli_errno($Cx); 
            return false;
        }       
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
    include 'databasecon.php';
    $Query = "DELETE FROM cuentas WHERE idcuenta = '$id'";
    if(mysqli_query($Cx,$Query)){
        header("location: ../PartyHard/");
    }

    
}

?>