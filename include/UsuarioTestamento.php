<?php

namespace LegadoDigital\App;

use LegadoDigital\App\Dao\UsuarioTestamentoDAO;

class UsuarioTestamento
{
    public static function buscaTestamento($user_id)
    {
        $userDAO = new UsuarioTestamentoDAO();

        return $userDAO->findTestamentById($user_id);
    }

    public static function guardaTestamento($user)
    {
        $userDAO = new UsuarioTestamentoDAO();

        return $userDAO->inserta($user);
    }

    public static function eliminarTestamento($user)
    {
        $userDAO = new UsuarioTestamentoDAO();

        $userDAO->delete($user);
    }

    public static function modificarTestamento($testamento)
    {
        $userDAO = new UsuarioTestamentoDAO();

        return $userDAO->updateTestament($testamento);
    }

    public static function muestraTestamento($user)
    {
        $userDAO = new UsuarioTestamentoDAO();

        return $userDAO->muestra($user);
    }
}
