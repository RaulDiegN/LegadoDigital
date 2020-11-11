<?php

namespace LegadoDigital\App\Form;

use LegadoDigital\App\UsuarioLogin;
use LegadoDigital\App\UsuarioRegistro;

/**
 * Form Modify Login and Register Data
 */
class FormModifyData extends Form
{
    public function __construct()
    {
        parent::__construct('form-modify-data', array(
            'action' => 'datosPersonales.php',
            'media-form' => 'enctype="multipart/form-data"',
        ));
    }

    protected function generaCamposFormulario($datos, $errores)
    {
        if (count($datos) === 0 && isset($_SESSION['user_id'])) {
            $user = UsuarioRegistro::findUser($_SESSION['user_id']);
            $datos = $this->getDataFromUser($user);
        }

        $html = <<<EOF
        <div class="row">
            <div class="column">
                <label id="image-label" for="image">Foto de perfil</label>
                <img id="profile" height="200" src="${datos['image']}" alt="Foto de perfil">
                <input type="file" name="image" id="image"/>
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" value="${datos['name']}">
            </div>

            <div class="column">
            <label for="lastname">Apellidos</label>
            <input type="text" name="lastname" id="lastname" value="${datos['lastname']}">
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="nickname">Nombre de usuario</label>
                <input type="text" name="nickname" id="nickname" value="${datos['nickname']}">
            </div>

            <div class="column">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="${datos['email']}">
            </div>
        </div>

        <div class="row">
           <div class="column">
                <label for="age">Edad</label>
                <input type="number" name="age" id="age"  min="0" value="${datos['age']}">
           </div>
           <div class="column">
                <label for="birthday">Fecha de nacimiento</label>
                <input type="date" name="birthday" id="birthday" min="1900-01-01" max="2002-01-01" value="${datos['birthday']}">
            </div>

            <div class="column">
                <label for="telephone">Telefono</label>
                <input type="tel" name="telephone" id="telephone" value="${datos['telephone']}">
            </div>
        </div>

        <div class="row">
            <div class="column">
                <label for="password">Contraseña Nueva</label>
                <input type="password" name="password" id="password">
            </div>

            <div class="column">
                <label for="repassword">Repetir contraseña nueva</label>
                <input type='password' name="repassword" id="repassword">
            </div>
        </div>

        <div class="form-group">
            <input type="radio" name="rate" id="rate_basic" value="básico" checked>
            <label for="rate_basic">Básico</label>
            <input type="radio" name="rate" id="rate_limited" value="limitado">
            <label for="user_normal">Limitado</label>
            <input type="radio" name="rate" id="rate_platinium" value="platinium">
            <label for="user_normal">Platinum</label>
        </div>
        <div class="form-group">
            <input type="submit" name="submit" id="submit" value="Aplicar Cambios">
        </div>
EOF;
        return $html;
    }

    protected function procesaFormulario($datos)
    {
        $result = array();
        $user = array();

        $user['user_name'] = isset($datos['name']) ? $datos['name'] : null;
        $user['user_rate'] = $datos['user_rate'];

        if ( empty($user['user_name']) ) {
            $result['user_name'] = '<span class="error">El nombre del usuario no puede estar vacío</span>';
        }

        $user['user_lastname'] = isset($datos['lastname']) ? $datos['lastname'] : null;

        if ( empty($user['user_lastname']) ) {
            $result['user_lastname'] = '<span class="error">Los apellidos de usuario no pueden estar vacío</span>';
        }

        $user['user_password'] = isset($datos['password']) ? $datos['password'] : null;

        if ( strlen($user['user_password']) > 0 && strlen($user['user_password']) < 5 ) {
            $result['user_password'] = '<span class="error">El longitud de la  nueva contraseña debe ser de 8 o más caracteres.</span>';
        }

        $user['user_repassword'] = isset($datos['repassword']) ? $datos['repassword'] : null;

        if ( strcmp($user['user_password'], $user['user_repassword']) !== 0 ) {
            $result['user_repassword'] = '<span class="error">Las contraseñas deben coincidir.</span>';
        }

        $user['user_email_login'] = isset($datos['email']) ? $datos['email'] : null;

        if ( empty($user['user_email_login']) ) {
            $result['user_email'] = '<span class="error">El email de usuario no puede estar vacío</span>';
        }

        $user['user_nickname'] = isset($datos['nickname']) ? $datos['nickname'] : null;

        if ( empty($user['user_nickname']) ) {
            $result['user_nickname'] = '<span class="error">El nombre de usuario no puede estar vacío</span>';
        }

        $user['user_age'] = isset($datos['age']) ? $datos['age'] : null;

        if ( $user['user_age'] > 0 && $user['user_age'] < 18 ) {
            $result['user_age'] = '<span class="error"> La edad no es permitida </span>';
        }

        $user['user_telephone'] = strlen($datos['telephone']) == 9 ? $datos['telephone'] : null;

        if ( strlen($datos['telephone']) > 0 && strlen($datos['telephone']) < 9) {
            $result['user_telephone'] = '<span class="error">El telefono no es valido</span>';
        } else {
            $user['user_telephone'] = intval($datos['telephone']);
        }

        // Comprobado
        /*
        $user['user_birth_date'] = isset($datos['birthday']) ? $datos['birthday'] : null;

        if ( $user['user_birth_date']) {
            $result['user_birth_date'] = '<span class="error"> Debe ser mayor de 18 años  </span>';
        }
        */
        if (count($result) === 0) {
            $user['user_id'] = $_SESSION['user_id'];
            $user['user_type'] = $_SESSION['user_type'];

            $usuarioLogin = UsuarioLogin::guarda($user);
            $user['user_email'] = $user['user_email_login'];
            UsuarioRegistro::actualiza($user);

            $_SESSION['user_nickname'] = $usuarioLogin->userNickname();

            $result = 'datosPersonales.php';
        }

        return $result;
    }

    private function getDataFromUser($user)
    {
        $data = array(
            'name' => $user->userName(),
            'lastname' => $user->userLastname(),
            'nickname' => $_SESSION['user_nickname'],
            'dni' => $user->userDNI() !== null ? $user->userDNI() : '',
            'email' => $user->userEmail(),
            'telephone' => $user->userTelephone() !== null ? $user->userTelephone() : '',
            'age' => $user->userAge() !== null ? $user->userAge() : '',
            'birthday' => $user->userBirthDate() !== null ? $user->userBirthDate() : '',
            'rate' => $user->userRate() !== null ? $user->userRate() : '',
            'image' => $user->userImage() !== null ? $user->userImage() : 'img/miembros/blank-profile.png',
        );

        return $data;
    }
}
