<?php
    require_once '../../config.php';

    use LegadoDigital\App\UsuarioLogin;

    $userId = intval(trim($_POST['userId']));
    $userStatus = trim($_POST['userStatus']);

    $value = $userStatus === 'Activo' ? 1 : 0;
    $success = UsuarioLogin::modificarBloqueoUsuario($userId, $value);

    if (!$success) {
        echo "El usuario no existe o ya ha sido bloqueado";
        exit();
    }

    echo "ok";

    //if ($userStatus === 'Bloqueado') {
        exit();
    //}

    // Enviar email para informar al usuario
    /*$user = UsuarioLogin::buscaUsuarioPorId($userId);

    $receiver = $user->userEmailLogin();
    $subject = "Eliminación de Legado Digital";
    $message = <<<EOT
<html>
<head>
    <title>Legado Digital</title>
</head>
<body>
    <h2>Notificación de suspensión de cuenta</h2>
    <p>
        Le informamos que su cuenta ha sido bloqueada. Para desbloquear su cuenta o cualquier aclaración puede ponerse en
        contacto con el administrador por medio del correo <a href="mailto:admin@legadodigital.com">admin@legadodigital.com</a>.
    </p>
</body>
</html>
EOT;

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: admin@legadodigital.com" . "\r\n";
    $headers .= "Reply-To: admin@legadodigital.com";

    mail('hhcoronado@ucm.es', $subject, $message, $headers);

    exit();*/
