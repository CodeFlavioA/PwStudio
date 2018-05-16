<?php
    echo "
    <div class=\"row center-xs\" id=\"box-psw\">
            <ul class=\"list-group\">
                <li class=\"list-group-item list-group-item-sucess\">
                    <span class=\"glyphicon glyphicon-ok\"></span> ¡Exito!
                </li>
                <li class=\"list-group-item list-group-item-sucess\">
                    <span class=\"glyphicon glyphicon-pencil\"></span> Tu clave ha sido generada
                </li>
                <li class=\"list-group-item list-group-item-sucess\">
                    <span class=\"glyphicon glyphicon-lock\"></span><p id=\"lacosa\" style=\"display:inline; \"> ".$_SESSION["pwt"]."</p>
                </li>
            </ul>
        </div>
    ";

?>