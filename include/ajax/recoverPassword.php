<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioRegistro;
    use LegadoDigital\App\UsuarioLogin;

    // Data from ajax serialize
    $user_nickname = htmlspecialchars(strip_tags(trim($_POST['nickname'])));
    $user_email = htmlspecialchars(strip_tags(trim($_POST['email'])));
    $user = UsuarioLogin::buscaUsuario($user_nickname);
    if ($user !== false) {
            if ($user->userEmailLogin()===$user_email){
                    $user_data = UsuarioRegistro::findUser($user->userId());
                     $response['message'] = 'Su contraseña fue enviada, verifique su correo';
                     $response['result'] = 'ok'; 
            }
            else {
                $response['message'] = 'Email es incorrecto';
            }
    } else {
        $response['message'] = 'Nombre de usuario incorrecto';
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();
