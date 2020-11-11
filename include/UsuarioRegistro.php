<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioRegistroDAO;

class UsuarioRegistro
{
    public static function findUser($user_id)
    {
        $userDAO = new UsuarioRegistroDAO();
        $user = $userDAO->findUserById($user_id);

        return $user;
    }

    public static function crea($user)
    {
        $userDAO = new UsuarioRegistroDAO();

        $res = $userDAO->inserta($user);
        return $res;
    }

    public static function actualiza($user)
    {
        $userDAO = new UsuarioRegistroDAO();

        return $userDAO->actualiza($user);
    }

    public static function delete($user)
    {
         $userDAO = new UsuarioRegistroDAO();

         return $userDAO->deleteUser($user);
    }

    public static function respuesta($user){
        $userDAO = new UsuarioRegistroDAO();

        return $userDAO->guardaRespuesta($user);
    }
}
