<?php

namespace LegadoDigital\App\Transfer;

/**
 * UsuarioEstadisticasVO Transfer Class
 */
class UsuarioEstadisticasVO
{
	private $user_id_statistic;

	private $storage;

	private $social_networks;

	private $unsuscribe_social_networks;

	private $social_networks_publication;

    /**
     * @return type
     */
    public function getUserIdStatistic()
    {
        return $this->user_id_statistic;
    }

    /**
     * @return type
     */
    public function getStorage()
    {
        return $this->storage;
    }

    /**
     * @return type
     */
    public function getSocialNetworks()
    {
        return $this->social_networks;
    }

    /**
     * @return type
     */
    public function getUnsuscribeSocialNetworks()
    {
        return $this->unsuscribe_social_networks;
    }

    /**
     * @return type
     */
    public function getSocialNetworksPublication()
    {
        return $this->social_networks_publication;
    }

    /**
     * @param type $user_id_statistic
     */
    public function setUserIdStatistic($user_id_statistic)
    {
        $this->user_id_statistic = $user_id_statistic;
        return $this;
    }

    /**
     * @param type $storage
     */
    public function setStorage($storage)
    {
        $this->storage = $storage;
        return $this;
    }

    /**
     * @param type $social_networks
     */
    public function setSocialNetworks($social_networks)
    {
        $this->social_networks = $social_networks;
        return $this;
    }

    /**
     * @param type $unsuscribe_social_networks
     */
    public function setUnsuscribeSocialNetworks($unsuscribe_social_networks)
    {
        $this->unsuscribe_social_networks = $unsuscribe_social_networks;
        return $this;
    }

    /**
     * @param type $social_networks_publication
     */
    public function setSocialNetworksPublication($social_networks_publication)
    {
        $this->social_networks_publication = $social_networks_publication;
        return $this;
    }
}