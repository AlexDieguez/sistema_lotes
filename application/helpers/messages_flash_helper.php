<?php
defined("BASEPATH") or die("Acceso prohibido");

if(!function_exists('messages_flash'))
{
    /**
    * @desc - muestra mensajes al usuario
    * @param $type - string con el tipo de panel de bootstrap
    * @param $flash - string mensaje a mostrar al usuario
    * @param $headMessage - string con el texto de la cabeceral del panel
    * @param $validation - bool, si es true son errores de form_validation, por defecto false
    * @return panel bootstrap con el contenido del mensaje
    */
    function messages_flash($type,$flash,$headMessage, $validation = false)
    {
        $ci =& get_instance();
        if($validation == true && validation_errors())
        {
        ?>
            <div id="card-alert" class="card pink lighten-5 panel-<?php echo $type ?>">
              <div class="card-content pink-text darken-1">
                <span class="card-title pink-text darken-1"><?php echo $headMessage ?></span>
                  <p><?php echo $flash ?></p>
              </div>
            </div>
        <?php
        }
        else if($ci->session->flashdata($flash))
        {
        ?>
            <div id="card-alert" class="card pink lighten-5 panel-<?php echo $type ?>">
              <div class="card-content pink-text darken-1">
                <span class="card-title pink-text darken-1"><?php echo $headMessage ?></span>
                <p><?php echo $ci->session->flashdata($flash) ?></p>
             </div>
        </div>
        <?php
        }
    }
}

?>