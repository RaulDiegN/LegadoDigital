<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioLogin;
    use LegadoDigital\App\UsuarioRegistro;

    $validExtensions = array(
        'jpeg',
        'jpg',
        'png',
    );

    $data = array(
        'user_name' => htmlspecialchars(strip_tags(trim($_POST['name']))),
        'user_lastname' => htmlspecialchars(strip_tags(trim($_POST['lastname']))),
        'user_nickname' => htmlspecialchars(strip_tags(trim($_POST['nickname']))),
        'user_email_login' => htmlspecialchars(strip_tags(trim($_POST['email']))),
        'user_password' => htmlspecialchars(strip_tags(trim($_POST['password']))),
        'user_age' => intval(htmlspecialchars(strip_tags(trim($_POST['age'])))),
        'user_telephone' => intval(htmlspecialchars(strip_tags(trim($_POST['telephone'])))),
        'user_birthday' => htmlspecialchars(strip_tags(trim($_POST['birthday']))),
        'user_rate' => htmlspecialchars(strip_tags(trim($_POST['rate']))),
    );

    $image = $_FILES['image'];

    if ($image['error'] === 0) {
        $targetDir = 'img/users/';
        $targetFile = $targetDir . basename($image['name']);
        $fileType = pathinfo($targetFile, PATHINFO_EXTENSION);
        list($height, $width) = getimagesize($image['tmp_name']);

        if (!in_array($fileType, $validExtensions)) {
            echo 'La extensión de la imagen no es válida.';
            exit();
        }

        if ($image['size'] > 1000000) {
            echo 'El tamaño de la imagen debe ser de 1MB como máximo.';
            exit();
        }

        if ($image['error'] > 0) {
            echo 'Error de imagen: ' . $image['error'];
            exit();
        }

        if ($height > 200 || $width > 200) {
            echo 'El alto y ancho de la imagen debe ser de 200px';
            exit();
        }

        $sourcePath = $image['tmp_name'];

        $targetPath = dirname(dirname(__DIR__)) . '/' . $targetDir . $_SESSION['user_id'] . '.' . $fileType;

        if (!move_uploaded_file($sourcePath, $targetPath)) {
            echo 'Se ha producido un error al subir la imagen.';
            exit();
        }
    }

    $data['user_id'] = $_SESSION['user_id'];
    $data['user_type'] = $_SESSION['user_type'];

    if (isset($fileType)) {
        $data['user_image'] = $targetDir . $_SESSION['user_id'] . '.' . $fileType;
    }

    $user = UsuarioLogin::buscaUsuario($_SESSION['user_nickname']);

    if (UsuarioLogin::compruebaPassword($data['user_password'], $user->userPassword())) {
        echo 'La contraseña debe ser diferente de la actual.';
        exit();
    }

    $usuarioLogin = UsuarioLogin::guarda($data);
    $data['user_email'] = $data['user_email_login'];
    UsuarioRegistro::actualiza($data);

    $_SESSION['user_nickname'] = $usuarioLogin->userNickname();

    $result = 'datosPersonales.php';

    echo 'ok';
