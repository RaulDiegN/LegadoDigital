<?php

namespace LegadoDigital\App\Dao;

use LegadoDigital\App\Application;
use LegadoDigital\App\Transfer\UsuarioAsociadoVO;

/**
 * UsuarioAsociado Data Access Object Class
 */
class UsuarioAsociadoDAO
{
    public function findAsociadoById($user_id)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM user_associated U WHERE U.associated_user_id = ?");
        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();
        $user = $result->fetch_assoc();

        return $user;
    }

    public static function inserta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO user_associated(associated_user_id, associated_email, associated_DNI, associated_lastname,
                    associated_firstname) VALUES(?,?,?,?,?)"
        );

        $query->bind_param("issss",
            $user['user_id'],
            $user['email'],
            $user['dni'],
            $user['lastname'],
            $user['name']
        );

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        return $user;
    }

    public static function updateAsociado($asociado)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare(
            "UPDATE user_associated SET associated_email = ?, associated_DNI = ?, associated_lastname = ?, associated_firstname = ?
            WHERE associated_user_id = ?"
        );

        $query->bind_param("ssssi",
            $asociado['email'],
            $asociado['dni'],
            $asociado['lastname'],
            $asociado['name'],
            $asociado['user_id']
        );

        if (!$query->execute()) {
            echo "Error al consultar en la BD";
            return false;
        }

        $query->close();

        return true;
    }


    
}