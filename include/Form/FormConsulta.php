<?php


namespace LegadoDigital\App\Form;

class FormConsulta extends Form
{
    public function __construct()
    {
        parent::__construct('form-consulta');
    }
    protected function generaCamposFormulario($datos, $errores)
    {

        if (count($datos) === 0 && isset($_SESSION['user_id'])) {
            $user = $_SESSION['user_id'];
        }

        $description = isset($datos['description']) ? $datos['description'] : '';
        $text_consulta = isset($datos['text_consulta']) ? $datos['text_consulta'] : '';


        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="description" placeholder="Escribe aqui tu descripción" value="$description">
        </div>
        <div class="form-group">
            <p>Escribe aquí tu Consulta:</p>
            <textarea rows="10" cols="50" name="text_consulta" >$text_consulta</textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Guardar">
        </div>
EOF;
        return $html;
    }
 /*  protected function procesaFormulario($datos)
    {
        $result = array();
        $consulta = array();
        $consulta['description'] = isset($datos['description']) ? $datos['description'] : null;
        if ( empty($consulta['description']) ) {
            $result['description'] = '<span class="error">La descripción no puede estar vacía</span>';
        }
        $consulta['text_consulta'] = isset($datos['text_consulta']) ? $datos['text_consulta'] : null;
        if ( empty($consulta['text_consulta']) ) {
            $result['text_consulta'] = '<span class="error">El testamento no puede estar vacío</span>';
        }
        if (count($result) === 0) {
            $consulta['user_id'] = $_SESSION['user_id'];
            $consulta['lawyer_asociated_id'] = UsuarioConsulta::buscaAbogado($consulta['user_id']);
            if (!($consulta['lawyer_asociated_id'])) {

                $consulta['lawyer_asociated_id'] = UsuarioConsulta::creaAbogado($consulta['user_id']);
            }
            $consulta['user_email'] = $_SESSION['user_email'];
            UsuarioConsulta::crea($consulta);
            $result = 'miHistoria.php';
        }
        return $result;
    }*/

}