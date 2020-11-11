<?php

namespace LegadoDigital\App\Transfer;

/**
 * UsuarioAsociadoVO Transfer Class
 */
class UsuarioAsociadoVO
{
	private $associated_id;

    private $associated_firstname;

    private $associated_lastname;

    private $associated_DNI;

    private $associated_email;

    private $associated_user_id;

    /* Getters */
    public function associatedId()
    {
    	return $this->associated_firstname;
    }

    public function associatedFirstname()
    {
    	return $this->associated_firstname;
    }

    public function associatedLastname()
    {
    	return $this->associated_Lastname;
    }

    public function associatedDNI()
    {
    	return $this->associated_DNI;
    }

    public function associatedFirstname()
    {
    	return $this->associated_email;
    }

    public function associatedUserId()
    {
    	return $this->associated_firstname;
    }

    /* Setters */
    /**
     * @param type $associated_firstname
     */
    public function setAssociatedFirstname($associated_firstname)
    {
        $this->associated_firstname = $associated_firstname;
        return $this;
    }

    /**
     * @param type $associated_lastname
     */
    public function setAssociatedLastname($associated_lastname)
    {
        $this->associated_lastname = $associated_lastname;
        return $this;
    }

    /**
     * @param type $associated_DNI
     */
    public function setAssociatedDNI($associated_DNI)
    {
        $this->associated_DNI = $associated_DNI;
        return $this;
    }

    /**
     * @param type $associated_email
     */
    public function setAssociatedEmail($associated_email)
    {
        $this->associated_email = $associated_email;
        return $this;
    }

    /**
     * @param type $associated_user_id
     */
    public function setAssociatedUserId($associated_user_id)
    {
        $this->associated_user_id = $associated_user_id;
        return $this;
    }
}