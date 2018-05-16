<?php
function GenerateRandomPassword($String,$a){
    $str_ar = explode(" ",$String); //separar palabras
    $DefaultSymbols = "#$%/&()-_.<>";
    $nStr   = ""; 
    //FASE 1: DESGLOZAR FRASE Y UNIRLA 
    foreach($str_ar as $word){
        $size  =  strlen($word); 
        $rand  = rand(0,$size-1);
        $short = substr($word,$rand); 
        $nStr .= $short; 
    }
    //FASE 2: CAMBIAR NUMXLETRAS
    $nStr = str_replace("a","4",$nStr);
    $nStr = str_replace("e","3",$nStr);
    $nStr = str_replace("i","¡",$nStr);
    $nStr = str_replace("o","0",$nStr);
    //FASE 3: CRIPT
    $key = getPrivateKey($_SESSION["usuario"]);
    $iv = $a;
    return encrypt($nStr,$key,$iv);
}
?>