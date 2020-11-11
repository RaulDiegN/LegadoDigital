<?php


namespace LegadoDigital\App\Dao;

use LegadoDigital\App\Application;

class UsuarioConsultaDAO
{
    public function findAbogadoById($user_id)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM lawyer_asociated U WHERE U.user_id = ?");
        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();
        $user = false;

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $user = $row['lawyer_asociated_id'];
        }

        return $user;
    }

    public function findConsultasById($user_id)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM consulta_user U WHERE U.user_id = ?");
        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();

        return $result;
    }

     public function findConsultaById($id_consulta)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM consulta_user U WHERE U.consulta_id = ?");
        $query->bind_param("i", $id_consulta);

        if (!$query->execute()) {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();

        return $result->fetch_assoc();
    }

    public static function inserta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO consulta_user(user_id, description, text_consulta, user_email) VALUES(?,?,?,?)"
        );

        $query->bind_param("isss",
            $user['lawyer_asociated_id'],
            $user['description'],
            $user['text_consulta'],
            $user['user_email']
        );

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        return $user;
    }

    public static function insertaAbogado($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM lawyer U WHERE 1");

        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();

        $min = 1;
        $rows_count = $result->num_rows;
        $max = $rows_count;


        $number = rand($min, $max) + 1;

        $query = $conn->prepare("SELECT * FROM lawyer U WHERE U.lawyer_id = ?");
        $query->bind_param("i", $number);
        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            exit();
        }
        $result = $query->get_result();
        $row = $result->fetch_assoc();

        $userAbogado = $row['user_id'];

        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO lawyer_asociated(user_id, lawyer_asociated_id) VALUES(?,?)"
        );

        $query->bind_param("ii",
            $user,
            $userAbogado
        );
        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            exit();
        }

        return $userAbogado;
    }

    public static function añade($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO lawyer(user_id) VALUES(?)"
        );

        $query->bind_param("i",
            $user
        );
        if (!$query->execute()) {
            echo 'Error al consultar la BD: (' . $conn->errno . ') ' . utf8_encode($conn->error);
            exit();
        }

        return $user;
    }


}