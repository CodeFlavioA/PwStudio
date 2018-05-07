<?php
function GetPrivateKey($user){
    include 'databasecon.php'    ;
    $Query = "SELECT RegisterKey from usuarios WHERE Email = '$user'"; 
        if($reg  = mysqli_query($Cx,$Query)){
          while($line = mysqli_fetch_array($reg)){
            return $line[0]; 
          }  
        } 
        return false; 
}
?>