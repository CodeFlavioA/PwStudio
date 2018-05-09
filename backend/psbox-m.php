<?php
    echo "
        <div class='fixed full-height full-width mod-ps no-margin' id='".$NUMID."'>
            <div class='container-box principal-grey-bg box-pass raleway-font'>
                <a class='delete-button closes white' href='#'>X</a>
                <div class='input-group inputs-add'>
                    <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-pencil'></span>
                    </span>
                    <input class='form-control' disabled='true' name='ndc' placeholder='Nombre de cuenta' style='font-family:Arial, FontAwesome' type='text' value='".$NameAC."'>
                </div>
                <div class='input-group inputs-add'>
                    <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-user'></span>
                    </span>
                    <input class='form-control' disabled='true' name='ndc' placeholder='Usuario' type='text' value='".$UserAC."'>
                </div>
                <div class='input-group inputs-add'>
                    <span class='input-group-addon'>
                    <span class='glyphicon glyphicon-lock'></span>
                    </span>
                    <input class='form-control' disabled='true' name='ndc' placeholder='Password' type='text' value='".$Pass."'>
                </div>
            </div>
        </div>
   ";
?>