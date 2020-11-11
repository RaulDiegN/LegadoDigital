<?php


namespace LegadoDigital\App\Form;

use LegadoDigital\App\UsuarioAsociado;

class FormAsociado extends Form
{
    public function __construct()
    {
        parent::__construct('form-asociado');
    }
    protected function generaCamposFormulario($datos, $errores)
    {
        if (count($datos) === 0 && isset($_SESSION['user_id'])) {
            $user = $_SESSION['user_id'];
            $asociado = UsuarioAsociado::buscaAsociado($user);

            if (!empty($asociado)) {
                $datos = $this->getDataFromTestament($asociado);
            }
        }
        $name = isset($datos['name']) ? $datos['name'] : '';
        $lastname = isset($datos['lastname']) ? $datos['lastname'] : '';
        $email = isset($datos['email']) ? $datos['email'] : '';
        $dni = isset($datos['dni']) ? $datos['dni'] : '';

        $html = <<<EOF
        <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Nombre" value="$name">
            <input type="text" name="lastname" id="lastname" placeholder="Apellidos" value="$lastname">
            <input type="text" name="dni" id="dni" placeholder="DNI" value="$dni">
            <input type="email" name="email" id="email" placeholder="Email" value="$email">

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
         $asociado = array();
         $asociado['name'] = isset($datos['name']) ? $datos['name'] : null;
         if ( empty($asociado['name']) ) {
             $result['name'] = '<span class="error">La descripción no puede estar vacía</span>';
         }
         $asociado['lastname'] = isset($datos['lastname']) ? $datos['lastname'] : null;
         if ( empty($asociado['lastname']) ) {
             $result['lastname'] = '<span class="error">El testamento no puede estar vacío</span>';
         }

         $asociado['email'] = isset($datos['email']) ? $datos['email'] : null;
         if ( empty($asociado['email']) ) {
             $result['email'] = '<span class="error">El testamento no puede estar vacío</span>';
         }

         $asociado['dni'] = isset($datos['dni']) ? $datos['dni'] : null;
         if ( empty($asociado['dni']) ) {
             $result['dni'] = '<span class="error">El testamento no puede estar vacío</span>';
         }

         if (count($result) === 0) {
             $asociado['user_id'] = $_SESSION['user_id'];

             if (UsuarioAsociado::buscaAsociado($asociado['user_id'])) {
                 UsuarioAsociado::modificarAsociado($asociado);
             }
             else{
                 UsuarioAsociado::guardaAsociado($asociado);
             }

             $result = 'usuarioAsociado.php';
         }
         return $result;
     }

    private function getDataFromTestament($asociado)
    {
        $data = [
            'name' => $asociado['associated_firstname'],
            'email' => $asociado['associated_email'],
            'lastname' => $asociado['associated_lastname'],
            'dni' => $asociado['associated_DNI'],
        ];

        return $data;
    }

}