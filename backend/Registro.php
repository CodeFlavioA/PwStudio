<?php
include 'databasecon.php';
//SE RECIBE ENCRIPTADO DE POST 

//DATOS DE REGISTRO

/**Tipo de operacion: 
 * 1 = primer registro
 * 2 = confirmacion de correo 
 * 3 = ingreso de contraseña
 */

//xtya: tipo de operacion
//xtyb: abrio el link de confirmacion
//xtka: llave encriptada desde email
//777
if(isset($_GET["xtya"])){ 
    // SI HAY TIPO DE VARIABLE ESTABLECIDO 
    if($_GET["xtya"] == "2"){ // Y ES 2 ENTRA A LA COFIRMACION DE CORREO
        echo "Valide el xtya 2djkls";
        if(isset($_GET["xtyb"])){
            if($_GET["xtyb"]=="777"){
                //SE REVISA LA LLAVE
                echo "Verificada xtya & b";
                if(isset($_GET["xtka"])){
                    //HACER CONSULTA AL SERVIDOR Y TRAERE LOS DATOS DEL SERVIDOR
                    echo "xtyk verificado";
                    $KEY = $_GET["xtka"];
                    $Query  = "SELECT * FROM usuarios WHERE RegisterKey  = '$KEY'";
                    echo "<br>".$Query; 
                    if($reg = mysqli_query($Cx, $Query)){
                        echo "QUERY REALIZADA";
                        while($line = mysqli_fetch_array($reg)){
                            $ksver = $line[1];#LLAVE DEL SERVIDOR
                            echo "Registro encontrado";
                            //LLAVE RELACIONADA CON USUARIO:
                            $usri = $line[1]; #USUARIO DESDE SERVIDOR
                            if($_GET["xtka"] == $ksver){
                                //SE ENVIA AL COSO DE CONTRASEÑA: 
                                header("location: ../PreParty/Validate/?xtka=$ksver");
                                //KEYALEATORIA (xtka) 
                                //TIPO (xtya) = 3 [EN HTML]
                            }
                        }
                    }else{
                        echo "No se pudo realizar query by: ". mysqli_error($Cx);
                    }
                }
            }
        }
    }else if ($_GET["xtya"] == "1"){
        echo "Validado xtya = 1";
        //SI ES EL PRIMER REGISTRO SE RECIBE DESDE FORM POR POST: 
        /**
        * DATOS DE REGISTRO
        * //////////////////////////////////
        * Usuario: Nombre de usuario con validacion de caracteres
        * Email: Para enviar correo de confirmación
        * //ALEATORIO
        * Llave aleatoria: caracteres aleatorios que llegan en el mensaje de confirmación
        * 
        * //FALTAN DATOS DEMOGRAFICOS
        * Datos demograficos para informacion
        * IP : publica del registro
        * GEOGRAF: Ubicacion de donde hizo el registro
        * Explorador: Explorador en donde se registró 
        * FHora : Fecha y hora del registro
        */
        if(isset($_REQUEST["ok"])){
            echo "boton pulsado";
            if(true){ //Aqui iba la validacion del nombre pero no pedire el nombre, esto es mas facil que borrar el condicional y volver a acomodar. tengo flojera. 
                if(isset($_POST["email"])){
                    $NOMBRE = "";
                    $Email = $_POST["email"];
                    $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890"; //posibles caracteres a usar
                    $numerodeletras=25; //numero de letras para generar el texto
                    $cadena = ""; //variable para almacenar la cadena generada
                    for($i=0;$i<$numerodeletras;$i++){
                        $cadena .= substr($caracteres,rand(0,strlen($caracteres)),1); 
                        /*
                        Extraemos 1 caracter de los caracteres 
                        entre el rango 0 a Numero de letras que tiene la cadena */
                    }
                    require_once 'Email.php'; 
                    echo $cadena; 
                    if($Cx){
                        echo "conexion realizada";
                        $Query = "INSERT INTO usuarios VALUES('$Email','$cadena','','0','')";
                        if(mysqli_query($Cx,$Query)){
                            echo "query dada";
                            session_start();
                            echo "EMAIL";
                            $_SESSION["NOTIFY"] = "Solo queda un paso para activar tu cuenta!! Verifica tu correo por un link de confirmacion :D";
                        }else{
                            echo "falló la cnexion por motivos: " . mysqli_error($Cx);
                        }
                    }
                }
            }
        }



        //SE ENCRIPTAN LOS DATOS CON KEYHIDDEN JIJIJIJI

        // SE INGRESAN A LA BASE DE DATOS SIN EL CAMPO HABILITADO

        //SE ENVIAN AL "ESPERE CONFIRMACION DE CORREO PARA HABILITAR SU CUENTA"
    }else if($_GET["xtya"] == "3"){
        //SE RECIBE CONTRASEÑA
        echo "validado xtya";
        if(isset($_POST["pass"])){
            if(isset($_GET["xtka"])){
                echo "validado pass y xtka";
                $PASS = $_POST["pass"];
                $KEY = $_GET["xtka"];

                $opciones = [
                    'cost' => 11,
                ];
                $PASSCR =  password_hash($PASS, PASSWORD_BCRYPT, $opciones);
                $Query = "UPDATE usuarios SET PasswordH = '$PASSCR',validate = '1' WHERE RegisterKey ='$KEY'";
                if(mysqli_query($Cx,$Query)){
                    echo "Query echo $PASSCR";
                    header("location: ../index.php");
                }
            }
        }
        //SE ENCRIPTA

        //SE ACTUALIZA LA BASE DE DATOS CON PASSWORD & HABILITADO = TRUE
        //SE ENVIA AL LOGIN. 
    }
}

?>