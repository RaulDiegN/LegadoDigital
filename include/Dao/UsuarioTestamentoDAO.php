<?php

namespace LegadoDigital\App\Dao;

use LegadoDigital\App\Application;
use LegadoDigital\App\Transfer\UsuarioTestamentoVO;

/**
 * Clase UsuarioTestamento Data Acces Object
 */

class UsuarioTestamentoDAO
{
    public function findTestamentById($user_id)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM testament_user U WHERE U.user_id = ?");
        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();
        $user = false;

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $user = $this->transferToUserObject($row);
        }

        return $user;
    }

    public static function inserta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO testament_user(user_id, description, text_testament, text_annexed) VALUES(?,?,?,?)"
        );

        $query->bind_param("isss",
            $user['user_id'],
            $user['description'],
            $user['text_testament'],
            $user['text_annexed']
        );

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        return $user;
    }

    public static function delete($user){
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("DELETE FROM testament_user WHERE user_id = '$user'");

        if (!$query->execute()) {
            echo "Error delete user";
            return false;
        }

        $query->close();
    }

    public static function muestra($user){
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT description, text_testament FROM testament_user U WHERE U.user_id = ?");
        $query->bind_param("i", $user);

        if (!$query->execute()) {
            echo "Error al consultar en la BD";
            return false;
        }

        $rs = $query->get_result();
        $result = $rs->fetch_assoc();

       return $result;
    }

    public static function updateTestament($testament)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare(
            "UPDATE testament_user SET description = ?, text_testament = ?, text_annexed = ?
            WHERE user_id = ?"
        );

        $query->bind_param("sssi",
            $testament['description'],
            $testament['text_testament'],
            $testament['text_annexed'],
            $testament['user_id']
        );

        if (!$query->execute()) {
            echo "Error al consultar en la BD";
            return false;
        }

        $query->close();

        return true;
    }

    private function transferToUserObject($row)
    {
        $user = new UsuarioTestamentoVO();

        $user->setUserId($row['user_id']);
        $user->setDescription($row['description']);
        $user->setTestament($row['text_testament']);
        $user->setTextAnnexed($row['text_annexed']);

        return $user;
    }
}
