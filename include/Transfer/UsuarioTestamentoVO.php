<?php

namespace LegadoDigital\App\Transfer;

/**
 * UsuarioTestamentoVO Transfer Class
 */
class UsuarioTestamentoVO
{
    private $user_id;

    private $description;

    private $text_testament;

    private $text_annexed;

    /*Getters*/
    public function getUserId()
    {
        return $this->user_id;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getTestament()
    {
        return $this->text_testament;
    }

    public function getTextAnnexed()
    {
        return $this->text_annexed;
    }

    /* Setters */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setTestament($text_testament)
    {
        $this->text_testament = $text_testament;
    }

    public function setTextAnnexed($text_annexed)
    {
        $this->text_annexed = $text_annexed;
    }
}