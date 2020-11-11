<?php

namespace LegadoDigital\App\Form;

use LegadoDigital\App\UsuarioLogin;

/**
 * FormLogin Class
 */
class FormLogin extends Form
{
    public function __construct()
    {
        parent::__construct('form-login', array(
            'action' => 'index.php',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="nickname" id="nickname" placeholder="Nombre de usuario">
            <span id="error-nickname" class="error"></span>
            <input type="password" name="password" id="password" placeholder="Contraseña">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
EOF;
        return $html;
    }
}
