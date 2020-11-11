<?php

namespace LegadoDigital\App\Form;


class FormRecoverPassword extends Form
{
    public function __construct()
    {
        
        parent::__construct('form-recoverpassword', array(
            'action' => 'recuperarPassword.php',
        ));
    }


    protected function generaCamposFormulario($datos, $errores)
    {
        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="nickname" id="nickname" placeholder="Nombre de usuario" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
        </div>
        <div id="show-question" class="form-group">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
EOF;

        return $html;
    }

}
