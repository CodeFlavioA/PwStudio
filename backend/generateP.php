<?php
session_start(); 
    require_once 'Encrypt.php';
    require_once 'privatekey.php';
    include_once "rnd-pass.php";
    if(isset($_POST["xtka"])){
        if(isset($_GET["xtyb"])){
            $key = $_POST["xtka"];
            if($_GET["xtyb"]==832){
                $_SESSION["pwt"] = GenerateRandomPassword($key,$_SESSION["usuario"]); 
                include_once 'Querys.php';
                $RegisterKey = getRegisterKeyByUser($_SESSION["usuario"]);
                addPhrase($RegisterKey,$key);
                header("location: ../PartyHard/GeneratePassword/?xtyb=383");
            }
        }
    }

?>