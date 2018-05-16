<?php
require_once '../backend/sessions_control.php' ;
include '../backend/databasecon.php' ;
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta content='' name='description'>
    <meta content='width=device-width, initial-scale=1' name='viewport'>
    <meta charset='utf-8'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:300,400' rel='stylesheet'>
    <link href='../css/bootstrap.css' rel='stylesheet'>
    <title>Password Studio Blue Labs</title>
    <script src='../js/vendor/modernizr-2.8.3.min.js'></script>
    <link href='../css/flexboxgrid.min.css' rel='stylesheet'>
    <link href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' rel='stylesheet'>
    <link href='../css/index.css' rel='stylesheet'>
</head>
    <div class='fixed full-height full-width no-margin hidden' id='mod-add'>
        <div class='container-box principal-grey-bg' id='box-add'>
            <a class='delete-button white' href='' id='close'>X</a>
            <br>
            <form action='../backend/AdC.php' method='POST'>
                <br>
                <div class='input-group inputs-add'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-pencil'></span>
                    </span>
                    <input class='form-control' name='desc' placeholder='Nombre de cuenta' style='font-family:Arial, FontAwesome' type='text' required>
                </div>
                <div class='input-group inputs-add'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-user'></span>
                    </span>
                    <input class='form-control' name='account' placeholder='Usuario' type='text' required>
                </div>
                <div class='input-group inputs-add'>
                    <span class='input-group-addon'>
                        <span class='glyphicon glyphicon-lock'></span>
                    </span>
                    <input class='form-control' name='pass' placeholder='Password' type='password' required>
                </div>
                <input class='send-form relaway-font' name='ndc' type='submit' value='Agregar Cuenta'>
            </form>
        </div>
    </div>
    <div class='fixed full-height left principal-black-bg help-border' id='helps'>
        <div class='relative full-height full-width' id='icons-container'>
            <div class='row padding-top-1em border-menu'  id="addmenubutton">
                <div class='col-xs-12 full-width no-margin no-padding icons' id='iconsA' style='background-image:url(../img/icons/add.png)'></div>
            </div>
            <div class='row padding-top-1em border-menu'>
                <div class='col-xs-12 full-width no-margin no-padding icons' id='iconG' style='background-image:url(../img/icons/genpass.png)'></div>
            </div>
            <div class='row padding-top-1em border-menu'>
                <div class='col-xs-12 full-width no-margin no-padding icons' id='icons' style='background-image:url(../img/icons/logout.png)'></div>
            </div>
        </div>
    </div>
    <div class='row menucontainer fixed full-width border-ligth-bottom principal-black-bg'>
        <div class='col-xs-1 no-padding'>
            <div class='box'>
                <img class='middle-xs' id='menu-button' src='../img/icons/menu-grey.png'>
            </div>
        </div>
        <div class='col-xs-11 no-padding'>
            <nav class='navigation absolute small flex-wrap'>
                <ul class='list-inline navigation raleway-font white'>
                    <li>
                        <a href="#">Passwords</a>
                    </li>
                    <li>
                        <a href = "GeneratePassword/">Generar Contraseñas</a>
                    </li>
                    <li>
                        <a>Ajustes</a>
                    </li>
                    <li>
                        <a href="../backend/logout.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class='relative' id='container-info'>
        <div class='row white' id='container-style-list'>
            <div class='relative'>
                <div class='col-xs-4 button-style principal-pink-bg' id='lista-button-id'>
                    <p>Lista</p>
                </div>
                <div class='col-xs-4 button-style principal-pink-bg' id='cuadro-button-id'>
                    <p>Cuadros</p>
                </div>
                <div class='col-xs-4 button-style principal-pink-bg' id='grupos-button-id'>
                    <p>Grupos</p>
                </div>
            </div>
        </div>
        <div class='row line-passwords center-xs'>
                <?php
                 $Query = "SELECT * FROM cuentas WHERE usuario = '".$_SESSION["usuario"]."'";
                 if($reg = mysqli_query($Cx,$Query)){
                    $TotalRegistros = mysqli_num_rows($reg);
                    if(isset($_GET["pgx"])){$page = $_GET["pgx"];}else {$page = 1;}
                    $MAXIMO_PAGINA = 11; 
                    $LIMITE = ($page-1) * $MAXIMO_PAGINA; 
                    /**
                    * pagina 1 inicia desde = 0 Termina en 11
                    * /ADELANTA de 0 a 0
                    * pagina 2 inicia desde = 12 Termina en 22
                    * /ADELANTA de 0 a 12
                    * pagina 3 inicia desde = 23 Termina en 33
                    * pagina 4 inicia desde = 34 Termina en 44
                    * Logica: 
                    * (Pagina - 1) * $MAXIMO_PAGINA;
                    * $LIMITE
                    *
                    */
                    //FOR PARA ADELANTAR AL INICIO
                    for($i=0; $i<$LIMITE; $i++){
                      $line = mysqli_fetch_array($reg);
                    }
                    //ESCRITURA
                
                    $i=1;
                    while( ($line = mysqli_fetch_array($reg)) && ($i<=11) ){
                      $NameAC = $line[0];
                      $email = $_SESSION["usuario"];
                      $UserAC = $line[2];
                      $NUMID = $line[3];
                      $Pass = $line[4];
                      /*
                      DESENCRIPTAR 
                      
                      */
                      include_once '../backend/Encrypt.php';
                      include_once '../backend/Querys.php';
                      $NameAC = decrypt($NameAC,getRegisterKey($_SESSION["usuario"]),$email);
                      $UserAC = decrypt($UserAC,getRegisterKey($_SESSION["usuario"]),$email);
                      $Pass = decrypt($Pass,getRegisterKey($_SESSION["usuario"]),$email);
                      
                      //MOSTRAR 
                      include '../backend/psbox-m.php';
                      include '../backend/psbox-c.php';
                      $i++;
                    }
                }
                ?>
            <div class='col-xs-12 col-lg-4 col-md-4 principal-pink-bg box-pass' id='add-box'>
                <a href='#'>
                    <img class='image-account no-margin' src='../img/icons/add.png'>
                </a>
            </div>
        </div>
    </div>
</body>
<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js' type='text/javascript'></script>
<script src='../js/index.js'></script>

</html>