<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioLoginDAO;

class UsuarioAdmin
{
    public static function buscaUsuario($user_nickname)
    {
        $userDAO = new UsuarioLoginDAO();

        return $userDAO->buscaUsuario($user_nickname);
    }

    public static function login($user_nickname, $user_password)
    {
        $userDAO = new UsuarioLoginDAO();

        $user = $userDAO->buscaUsuario($user_nickname);

        if ($user !== false && self::compruebaPassword($user_password, $user->userPassword())) {
            return $user;
        }

        return false;
    }

    public static function buscaTodosUsuarios($user_type)
    {
        $userDAO = new UsuarioLoginDAO();
        
        return $userDAO->buscaTodosUsuarios($user_type);
    }

    public static function bloquearUsuario($user_id,$banned){
            
        $userDAO = new UsuarioLoginDAO();
        return $userDAO->bloquearUsuario($user_id,$banned);
    }

    public static function deleteUser($user_id)
    {
       
        $userLogin = new UsuarioLogin();

        $userLogin->delete($user_id);
    }

    public static function crea($user)
    {
        $userDAO = new UsuarioLoginDAO();

        return $userDAO->inserta($user);
    }

    public static function guarda($user)
    {
        $userDAO = new UsuarioLoginDAO();

        if ($user['user_id'] !== null) {
            return $userDAO->actualiza($user);
        }

        return $userDAO->inserta($user);
    }

    public static function compruebaPassword($password, $user_password)
    {
       return password_verify($password, $user_password);
    }
}