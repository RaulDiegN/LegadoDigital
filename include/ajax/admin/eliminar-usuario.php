<?php
    require_once '../../config.php';

    use LegadoDigital\App\UsuarioLogin;
    use LegadoDigital\App\UsuarioRuta;

    $userId = trim($_POST['userId']);

    $user = UsuarioLogin::buscaUsuarioPorId(intval($userId));

    $success = UsuarioLogin::eliminar(intval($userId));

    if (!$success) {
        echo 'El usuario no existe o ya ha sido bloqueado';
        exit();
    }

    // Eliminar carpeta de usuario
    UsuarioRuta::eliminaDirectorio('../../../archivos/' . $userId);

    // Enviar email para informar al usuario
    /*$receiver = $user->userEmailLogin();
    $subject = "Notificación de Legado Digital";
    $message = <<<EOT
<html>
<head>
    <title>Legado Digital</title>
</head>
<body>
    <h2>Notificación de eliminación de cuenta</h2>
    <p>
        Debido al excesivo tiempo de inactividad se ha decidido eliminar su cuenta de
        usuario. Para cualquier aclaración puede contactar con el administrador por
        medio del correo <a href="mailto:admin@legadodigital.com">admin@legadodigital.com</a>.
    </p>
</body>
</html>
EOT;

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: admin@legadodigital.com" , "\r\n";
    $headers .= "Reply-To: admin@legadodigital.com";

    mail($receiver, $subject, $message, $headers);*/

    echo 'ok';
    exit();
