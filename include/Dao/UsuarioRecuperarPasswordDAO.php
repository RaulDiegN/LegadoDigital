<?php
/**
 * Created by PhpStorm.
 * User: Ricardo D. Cabrera
 * Date: 23/03/2019
 * Time: 10:58
 */

namespace LegadoDigital\Web\Dao;

use LegadoDigital\App\Application;
use LegadoDigital\App\Transfer\UsuarioRecuperarPassVO;

class UsuarioRecuperarPasswordDAO
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

        return $user;
    }


}