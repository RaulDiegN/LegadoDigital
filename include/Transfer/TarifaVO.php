<?php

namespace LegadoDigital\App\Transfer;

/**
 * Tarifa Data Transfer Object Class
 */
class TarifaVO
{
	private $package_id;

	private $living_will;

	private $storage;

	private $social_networks;

	private $unsuscribe_social_networks;

	private $social_networks_publication;

	private $online_reputation;

	private $legal_advice;

    /**
     * @return type
     */
    public function getPackageId()
    {
        return $this->package_id;
    }

    /**
     * @return type
     */
    public function getLivingWill()
    {
        return $this->living_will;
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
     * @return type
     */
    public function getOnlineReputation()
    {
        return $this->online_reputation;
    }

    /**
     * @return type
     */
    public function getLegalAdvice()
    {
        return $this->legalAdvice;
    }

    /**
     * @param type $package_id
     */
    public function setPackageId($package_id)
    {
        $this->package_id = $package_id;
    	return $this;
    }

    /**
     * @param type $living_will
     */
    public function setLivingWill($living_will)
    {
        $this->living_will = $living_will;
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

    /**
     * @param type $online_reputation
     */
    public function setOnlineReputation($online_reputation)
    {
        $this->online_reputation = $online_reputation;
    	return $this;
    }

    /**
     * @param type $legal_advice
     */
    public function setLegalAdvice($legal_advice)
    {
        $this->legal_advice = $legal_advice;
    	return $this;
    }
}
