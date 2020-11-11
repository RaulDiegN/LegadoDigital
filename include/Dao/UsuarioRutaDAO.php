<?php

namespace LegadoDigital\App\Dao;

use LegadoDigital\App\Application;
use LegadoDigital\App\Transfer\UsuarioRutaVO;

/**
 * UsuarioRuta Data Access Object Class
 */
class UsuarioRutaDAO
{

    public function findPath($user_id)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT name_path FROM user_path U WHERE U.user_id = ?");

        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            return false;
            exit();
        }

        $rs = $query->get_result();
        $result = $rs->fetch_assoc();

        $query->close();

        return $result['name_path'];
    }


    public function insertPath($user_id, $user_path){
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare(
            "INSERT INTO user_path(user_id, name_path) VALUES (?,?)"
        );

        $query->bind_param("is",
            $user_id,
            $user_path
        );

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        return $user_id;
    }

    public function updatePath($user_id, $user_path)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("UPDATE user_path SET name_path = ? WHERE user_id = ?");

        $query->bind_param("si",
            $user_path,
            $user_id
        );

        if (!$query->execute()) {
            echo "Error al consultar en la BD";
            exit();
        }

        return true;
    }

}
