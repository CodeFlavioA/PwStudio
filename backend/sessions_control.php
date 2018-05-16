<?php
session_start(); 
if(!isActiveSession()){header("location: ../");}
    //Valida que el usuario esté activo
function isActiveSession(){
    if(!isset($_SESSION["usuario"])){
        return false; 
    }else{
        return true; 
    }
}
?>