<?php
/**
 * Created by PhpStorm.
 * User: Anonymous
 * Date: 05/05/2019
 * Time: 20:21
 */

namespace LegadoDigital\App\Form;


class FormCajafuerte extends Form
{
    public function __construct()
    {
        parent::__construct('form-cajafuerte', array(
            'action' => 'cajafuerte.php',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="nickname" id="nickname" placeholder="Nombre de usuario">
            <span id="error-nickname" class="error"></span>
            <input type="password" name="password" id="password" placeholder="Contraseña Caja Fuerte">
            <a href="crearContrasenaCajafuerta.php" style="float: center;color:red;margin-top:2px">Crear Contraseña | Olvido Contraseña</a>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Acceder">
        </div>
EOF;
        return $html;
    }
}