<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioAsociadoDAO;

class UsuarioAsociado
{
    public static function buscaAsociado($user_id)
    {
        $userDAO = new UsuarioAsociadoDAO();

        return $userDAO->findAsociadoById($user_id);
    }

    public static function guardaAsociado($user)
    {
        $userDAO = new UsuarioAsociadoDAO();

        return $userDAO->inserta($user);
    }

    public static function modificarAsociado($asociado)
    {
        $userDAO = new UsuarioAsociadoDAO();

        return $userDAO->updateAsociado($asociado);
    }
}