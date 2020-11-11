<?php

namespace LegadoDigital\App\Form;

use LegadoDigital\App\UsuarioRegistro;
use LegadoDigital\App\UsuarioLogin;

/**
 * FormRegister Class
 */
class FormRegister extends Form
{
    public function __construct() {
        parent::__construct('form-register', array(
            'action' => 'index.php',
        ));
    }

	protected function generaCamposFormulario($datos, $errores)
    {
        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Nombre">
            <input type="text" name="lastname" id="lastname" placeholder="Apellidos">
            <input type="text" name="nickname" id="nickname" placeholder="Nombre de usuario">
            <input type="email" name="email" id="email" placeholder="Email">
            <input type="password" name="password" id="password" placeholder="Contraseña">
            <input type="password" name="repassword" id="repassword" placeholder="Repetir contraseña">
        </div>
        <div class="form-group">
            <input type="radio" name="user_type" id="user_abogado" value="user_lawer">
            <label for="user_abogado">Abogado</label>
            <input type="radio" name="user_type" id="user_normal" value="user_client" checked>
            <label for="user_normal">Normal</label>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Registrar">
        </div>
EOF;
        return $html;
    }
}
