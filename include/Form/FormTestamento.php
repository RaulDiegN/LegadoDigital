<?php

namespace LegadoDigital\App\Form;

use LegadoDigital\App\UsuarioTestamento;
use LegadoDigital\App\Transfer\UsuarioTestamentoVO;


class FormTestamento extends Form
{
    public function __construct()
    {
        parent::__construct('form-testament', array(
            'action' => 'subirTestamento.php',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        if (count($datos) === 0 && isset($_SESSION['user_id'])) {
            $user = $_SESSION['user_id'];
            $testament = UsuarioTestamento::buscaTestamento($user);

            if (!empty($testament)) {
                $datos = $this->getDataFromTestament($testament);
            }
        }

        $description = isset($datos['description']) ? $datos['description'] : '';
        $text_testament = isset($datos['text_testament']) ? $datos['text_testament'] : '';
        $annexed = isset($datos['text_annexed']) ? $datos['text_annexed'] : '';

        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="description" placeholder="Escribe aqui tu descripción" value="$description">
        </div>
        <div class="form-group">
            <p>Escribe aquí tu testamento:</p>
            <textarea rows="10" cols="50" name="text_testament" >$text_testament</textarea>
        </div>
        <div class="form-group">
            <p>Anexo:</p>
            <textarea name="text_annexed" rows="5" cols="50">$annexed</textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Guardar">
        </div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $testamento = array();
        $testamento['description'] = isset($datos['description']) ? $datos['description'] : null;
        if ( empty($testamento['description']) ) {
            $result['description'] = '<span class="error">La descripción no puede estar vacía</span>';
        }
        $testamento['text_testament'] = isset($datos['text_testament']) ? $datos['text_testament'] : null;
        if ( empty($testamento['text_testament']) ) {
            $result['text_testament'] = '<span class="error">El testamento no puede estar vacío</span>';
        }
        if (count($result) === 0) {
            $testamento['user_id'] = $_SESSION['user'];
            UsuarioTestamento::eliminarTestamento($testamento['user_id']);
            UsuarioTestamento::guardaTestamento($testamento);
            $result = 'testamento.php';
        }
        return $result;
    }

    private function getDataFromTestament($testament)
    {
        $data = [
            'description' => $testament->getDescription(),
            'text_testament' => $testament->getTestament(),
            'text_annexed' => $testament->getTextAnnexed(),
        ];

        return $data;
    }

}
