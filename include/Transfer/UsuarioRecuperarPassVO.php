<?php
/**
 * Created by PhpStorm.
 * User: Ricardo D. Cabrera
 * Date: 23/03/2019
 * Time: 10:54
 */

namespace LegadoDigital\App\Transfer;

class UsuarioRecuperarPassVO
{
    private $user_id;

    private $user_nickname;

    private $user_password;

    private $user_email_login;

    private $user_type;


    /* Getters */
    public function userId()
    {
        return $this->user_id;
    }

    public function userNickname()
    {
        return $this->user_nickname;
    }

    public function userPassword()
    {
        return $this->user_password;
    }

    public function userEmailLogin()
    {
        return $this->user_email_login;
    }

    public function userType()
    {
        return $this->user_type;
    }

    /* Setters */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }

    public function setUserNickname($user_nickname)
    {
        $this->user_nickname = $user_nickname;
    }

    public function setUserPassword($user_password)
    {
        $this->user_password = $user_password;
    }

    public function setUserEmailLogin($user_email_login)
    {
        $this->user_email_login = $user_email_login;
    }

    public function setUserType($user_type)
    {
        $this->user_type = $user_type;
    }

}