<?php

namespace LegadoDigital\App\Dao;

use LegadoDigital\App\Application;
use LegadoDigital\App\Transfer\UsuarioRegistroVO;

/**
 * Clase UsuarioRegistro Data Acces Object
 */
class UsuarioRegistroDAO
{
    public function findUserById($user_id)
    {
    	$app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("SELECT * FROM user_data U WHERE U.user_id = ?");
        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $result = $query->get_result();

        $user = false;

        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            $user = $this->transferToUserObject($row);
        }

        $query->close();

        return $user;
    }

    public function inserta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query= $conn->prepare(
            "INSERT INTO user_data(user_id, user_name, user_lastname, user_email, user_age,
            user_telephone, user_DNI, user_birth_date, date_account_create,
            date_account_remove, user_image) VALUES (?,?,?,?,?,?,?,?,?,?,?)"
        );

        $date = date("Y-m-d H:i:s");

        $query->bind_param("isssiisssss",
            $user['user_id'],
            $user['user_name'],
            $user['user_lastname'],
            $user['user_email_login'],
            $user['user_age'],
            $user['user_telephone'],
            $user['user_DNI'],
            $user['user_birth_date'],
            $date,
            $user['date_account_remove'],
            $user['user_image']
        );

        if ($query->execute()) {
            $user['user_id'] = $conn->insert_id;
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $query->close();

        return $user;
    }

    public function actualiza($usuario)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $image = isset($usuario['user_image']) ? ', user_image = ?' : '';
        $stmt = <<<EOT
        UPDATE user_data SET user_name = ?, user_lastname = ?, user_email = ?, user_age = ?,
        user_telephone = ?, user_DNI = ?, user_birth_date = ?, date_account_remove = ?,
        user_rate = ?$image WHERE user_id = ?
EOT;

        $query = $conn->prepare($stmt);

        if (isset($usuario['user_image'])) {
            $query->bind_param("sssiisssssi",
                $usuario['user_name'],
                $usuario['user_lastname'],
                $usuario['user_email'],
                $usuario['user_age'],
                $usuario['user_telephone'],
                $usuario['user_DNI'],
                $usuario['user_birth_date'],
                $usuario['date_account_remove'],
                $usuario['user_rate'],
                $usuario['user_image'],
                $usuario['user_id']
            );
        } else {
            $query->bind_param("sssiissssi",
                $usuario['user_name'],
                $usuario['user_lastname'],
                $usuario['user_email'],
                $usuario['user_age'],
                $usuario['user_telephone'],
                $usuario['user_DNI'],
                $usuario['user_birth_date'],
                $usuario['date_account_remove'],
                $usuario['user_rate'],
                $usuario['user_id']
            );
        }

        if (!$query->execute()) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }

        $query->close();

        return $usuario;
    }

    public function deleteUser($user_id) 
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("DELETE FROM user_data WHERE user_id = ?");

        $query->bind_param("i", $user_id);

        if (!$query->execute()) {
            echo "Error delete user";
            return false;
        }

        $query->close();

        return true;
    }

    private function transferToUserObject($row)
    {
        $user = new UsuarioRegistroVO();

        $user->setUserId($row['user_id']);
        $user->setUserName($row['user_name']);
        $user->setUserLastname($row['user_lastname']);
        $user->setUserDNI($row['user_DNI']);
        $user->setUserBirthDate($row['user_birth_date']);
        $user->setUserAge($row['user_age']);
        $user->setUserEmail($row['user_email']);
        $user->setUserTelephone($row['user_telephone']);
        $user->setDateAccountCreate($row['date_account_create']);
        $user->setDateAccountRemove($row['date_account_remove']);
        $user->setUserRate($row['user_rate']);
        $user->setUserImage($row['user_image']);

        return $user;
    }

    public function guardaRespuesta($user)
    {
        $app = Application::getSingleton();
        $conn = $app->dbConnection();
        $query = $conn->prepare("UPDATE user_data SET user_question = ?, user_response = ? WHERE user_id = ?");

        $query->bind_param("ssi",
            $user['user_question'],
            $user['user_response'],
            $user['user_id']
        );

        if (!$query->execute()){
            echo "Error update user";
            return false;
        }

        $query->close();

        return true;
    }
}
