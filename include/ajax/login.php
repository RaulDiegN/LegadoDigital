<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioLogin;

    // Data from ajax serialize
    $user_nickname = htmlspecialchars(strip_tags(trim($_POST['nickname'])));
    $user_password = htmlspecialchars(strip_tags(trim($_POST['password'])));

    $user = UsuarioLogin::login($user_nickname, $user_password);

    if ($user === false) {
        echo 'Nombre de usuario o contraseña incorrectos';
        exit();
    }

    if ($user->userBanned() === 1) {
        echo 'Usuario bloqueado. Por favor ponte en contacto con el administrador de la web. <a href="mailto:admin@legadodigital.com">admin@legadodigital.com</a>';
        exit();
    }

    $_SESSION['user_id'] = $user->userId();
    $_SESSION['user_nickname'] = $user->userNickname();
    $_SESSION['user_email'] = $user->userEmailLogin();
    $_SESSION['user_type'] = $user->userType();

    if($user->userType() == "user_lawer") {
        $_SESSION['abogado'] = true;
    } elseif($user->userType() == "user_admin"){
        $_SESSION['admin'] = true;
    }

    echo 'ok';
