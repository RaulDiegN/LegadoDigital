<?php

namespace LegadoDigital\App\Transfer;

/**
 * UsuarioRegistro Transfer Object Class
 */
class UsuarioRegistroVO
{
    private $user_id;

    private $user_name;

    private $user_lastname;

    private $user_telephone;

    private $user_email;

    private $user_age;

    private $user_DNI;

    private $user_response;

    private $user_birth_date;

    private $date_account_create;

    private $date_account_remove;

    private $user_rate;

    private $user_image;

    /* Getters */
    public function userId()
    {
        return $this->user_id;
    }

    public function userName()
    {
        return $this->user_name;
    }

    public function userLastname()
    {
        return $this->user_lastname;
    }

    public  function  userResponse()
    {
        return $this->user_response;
    }

    public function userTelephone()
    {
        return $this->user_telephone;
    }

    public function userEmail()
    {
        return $this->user_email;
    }

    public function userAge()
    {
        return $this->user_age;
    }

    public function userDni()
    {
        return $this->user_DNI;
    }

    public function userBirthDate()
    {
        return $this->user_birth_date;
    }

    public function dateAccountCreate()
    {
        return $this->date_account_create;
    }

    public function dateAccountRemove()
    {
        return $this->date_account_remove;
    }

    public function userRate()
    {
        return $this->user_rate;
    }

    public function userImage()
    {
        return $this->user_image;
    }

    /* Setters */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setUserName($user_name)
    {
        $this->user_name = $user_name;
    }

    public function setUserLastname($user_lastname)
    {
        $this->user_lastname = $user_lastname;
    }

    public function setUserTelephone($user_telephone)
    {
        $this->user_telephone = $user_telephone;
    }

    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;
    }

    public function setUserAge($user_age)
    {
        $this->user_age = $user_age;
    }

    public function setUserDni($user_DNI)
    {
        $this->user_DNI = $user_DNI;
    }

    public function setUserBirthDate($user_birth_date)
    {
        $this->user_birth_date = $user_birth_date;
    }

    public function setDateAccountCreate($date_account_create)
    {
        $this->date_account_create = $date_account_create;
    }

    public function setDateAccountRemove($date_account_remove)
    {
        $this->date_account_remove = $date_account_remove;
    }

    public function setUserRate($user_rate)
    {
        $this->user_rate = $user_rate;
    }

    public function setUserImage($user_image)
    {
        $this->user_image = $user_image;
    }
}
