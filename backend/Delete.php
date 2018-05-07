<?php
    require_once "Querys.php";
    if(isset($_GET["ID"])){
        session_start();
        $user = $_SESSION["usuario"];
        DeleteDataAccount($user,$_GET["ID"]);
    }
?>