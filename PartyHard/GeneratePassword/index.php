<!DOCTYPE html>
<html>

<head>
    <meta content="Come rico en el mejor restaurante de la ciudas" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400" rel="stylesheet">
    <link href="../../css/bootstrap.css" rel="stylesheet">
    <title>Password Studio Blue Labs</title>
    <script src="../../js/vendor/modernizr-2.8.3.min.js"></script>
    <link href="../../css/flexboxgrid.min.css" rel="stylesheet">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../css/index.css" rel="stylesheet">
</head>

<body>
    <div class="fixed full-height left principal-black-bg help-border" id="helps">
        <div class="relative full-height full-width" id="icons-container">
            <div class="row padding-top-1em border-menu">
                <div class="col-xs-12 full-width no-margin no-padding icons" id="icons" style="background-image:url(../../img/icons/add.png)"></div>
            </div>
            <div class="row padding-top-1em border-menu">
                <div class="col-xs-12 full-width no-margin no-padding icons" id="iconG" style="background-image:url(../../img/icons/genpass.png)"></div>
            </div>
            <div class="row padding-top-1em border-menu">
                <div class="col-xs-12 full-width no-margin no-padding icons" id="icons" style="background-image:url(../../img/icons/logout.png)"></div>
            </div>
        </div>
    </div>
    <div class="row menucontainer fixed full-width border-ligth-bottom principal-black-bg">
        <div class="col-xs-1 no-padding">
            <div class="box">
                <img class="middle-xs" id="menu-button" src="../../img/icons/menu-grey.png">
            </div>
        </div>
        <div class="col-xs-11 no-padding">
            <nav class="navigation absolute small flex-wrap">
                <ul class="list-inline navigation raleway-font white">
                    <li>
                        <a>Passwords</a>
                    </li>
                    <li>
                        <a href = "#">Generar Contraseñas</a>
                    </li>
                    <li>
                        <a>Ajustes</a>
                    </li>
                    <li>
                        <a>Cerrar Sesion</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <div class="relative" id="container-info">
        <div class="row center-xs">
            <h2 class="raleway-font">Genera tu password con tu canción favorita!!</h2>
        </div>
        <div class="row center-xs">
            <div class="input-group inputs-add" id="icon-security">
                <span class="glyphicon glyphicon-barcode"></span>
            </div>
        </div>
        <div class="row center-xs" id="input-space">
            <form method="post" action= "../../backend/generateP.php?xtyb=832">
                <input name= "xtka" class="form-control relative" placeholder="Escribe lo que se te ocurra" type="text">
                <span class="help-block">aleatoriamente crearemos una contraseña para ti, segura y confiable con algoritmos avanzados de encriptacion a partir del texto que ingresaste</span>
                <button name = "generateBtn"class="btn btn-success relative" type="submit">Generar Password Segura</button>
            </form>
        </div>
        <?php
            if(isset($_GET["xtyb"])){
                if($_GET["xtyb"] == 383){
                    include '../../backend/boxgenerate.php';
                }
            }

        ?>
        
    </div>
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="../../js/index.js"></script>

</html>