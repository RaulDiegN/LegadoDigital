<?php
    require_once '../config.php';

    use LegadoDigital\App\UsuarioRegistro;

    // Data from ajax serialize
    $responseQuestion['user_question'] = htmlspecialchars(strip_tags(trim($_POST['desplePregunta'])));
    $responseQuestion['user_response'] = htmlspecialchars(strip_tags(trim($_POST['response'])));
    $responseQuestion['user_id'] = $_SESSION['user_id'];
    if (isset($responseQuestion)) {
            UsuarioRegistro::respuesta($responseQuestion);
            $response['message'] ='Su respuesta y Pregunta a sido exitomente guardada';   
            $response['result'] ='ok';   
    } else {
              $response['message']='Error en su respuesta';
    }

    echo json_encode($response, JSON_UNESCAPED_UNICODE);
    exit();