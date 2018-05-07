<?php
require_once "Querys.php";
session_start(); 
    if(isset($_POST["account"])){
        if(isset($_POST["pass"])){
            $a = $_POST["account"]; 
            $b = $_POST["pass"]; 
            $c = $_SESSION["usuario"];
            $d = $_POST["desc"];
            SaveDataAccounts($d,$c,$a,$b);
            
        }
    }
?>