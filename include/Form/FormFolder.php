<?php

namespace LegadoDigital\App\Form;


use LegadoDigital\App\UsuarioRuta;

class FormFolder extends Form
{
    public function __construct()
    {
        parent::__construct('form-folder', array(
            'action' => 'archivador.php',
            'media-form' => 'enctype="multipart/form-data"',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        $error['folder'] = isset($errores['folder']) ? $errores['folder'] : '';

        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="folder" id="folder" placeholder="Nombre de la carpeta" required>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Enviar">
        </div>
EOF;
        return $html;
    }

}
