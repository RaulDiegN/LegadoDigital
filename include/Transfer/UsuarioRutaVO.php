<?php

namespace LegadoDigital\App\Transfer;

/**
 * UsuarioRutaVO Transfer Class
 */
class UsuarioRutaVO
{
	private $user_id;

	private $name_path;

    /**
     * @return type
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @return type
     */
    public function getNamePath()
    {
        return $this->name_path;
    }

    /**
     * @param type $user_id
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @param type $name_path
     */
    public function setNamePath($name_path)
    {
        $this->name_path = $name_path;
        return $this;
    }
}