<?php

namespace World\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Countrylanguage
 *
 * @ORM\Table(name="countrylanguage", indexes={@ORM\Index(name="CountryCode", columns={"CountryCode"})})
 * @ORM\Entity
 */
class Countrylanguage
{
    /**
     * @var string
     *
     * @ORM\Column(name="Language", type="string", length=30, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $language = '';

    /**
     * @var float
     *
     * @ORM\Column(name="Percentage", type="float", precision=4, scale=1, nullable=false)
     */
    private $percentage = '0.0';

    /**
     * @var boolean
     *
     * @ORM\Column(name="IsOfficial", type="boolean", nullable=false)
     */
    private $isofficial = '0';

    /**
     * @var \World\Entity\Country
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="World\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CountryCode", referencedColumnName="Code")
     * })
     */
    private $countrycode;



    /**
     * Set language
     *
     * @param string $language
     * @return Countrylanguage
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set percentage
     *
     * @param float $percentage
     * @return Countrylanguage
     */
    public function setPercentage($percentage)
    {
        $this->percentage = $percentage;

        return $this;
    }

    /**
     * Get percentage
     *
     * @return float 
     */
    public function getPercentage()
    {
        return $this->percentage;
    }

    /**
     * Set isofficial
     *
     * @param boolean $isofficial
     * @return Countrylanguage
     */
    public function setIsofficial($isofficial)
    {
        $this->isofficial = $isofficial;

        return $this;
    }

    /**
     * Get isofficial
     *
     * @return boolean 
     */
    public function getIsofficial()
    {
        return $this->isofficial;
    }

    /**
     * Set countrycode
     *
     * @param \World\Entity\Country $countrycode
     * @return Countrylanguage
     */
    public function setCountrycode(\World\Entity\Country $countrycode)
    {
        $this->countrycode = $countrycode;

        return $this;
    }

    /**
     * Get countrycode
     *
     * @return \World\Entity\Country 
     */
    public function getCountrycode()
    {
        return $this->countrycode;
    }
}
