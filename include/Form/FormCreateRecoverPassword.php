<?php
/**
 * Created by PhpStorm.
 * User: Genesis Duque
 * Date: 29/03/2019
 * Time: 21:15
 */

namespace LegadoDigital\App\Form;

use LegadoDigital\App\UsuarioRegistro;

class FormCreateRecoverPassword extends  Form
{
    public function __construct() {
        parent::__construct('form-create-responsePassword',array(
            'action' => 'crearRespuestaPassword.php',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {

        $html = <<<EOF
        <div class="form-group">
             <select name="desplePregunta">
                <option value="Nombre de mascota">¿Nombre de mascota?</option>
                <option value="Nombre del mejor amigo">¿Nombre del mejor amigo?</option>
                <option value="Ciudad de Nacimiento">¿Ciudad de Nacimiento?</option>
            </select>
            <input type="text" name="response" id="response" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
EOF;

        return $html;
    }
}