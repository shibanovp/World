<?php

namespace World\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * City
 *
 * @ORM\Table(name="city", indexes={@ORM\Index(name="CountryCode", columns={"CountryCode"})})
 * @ORM\Entity
 */
class City
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ID", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=35, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="District", type="string", length=20, nullable=false)
     */
    private $district = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="Population", type="integer", nullable=false)
     */
    private $population = '0';

    /**
     * @var \World\Entity\Country
     *
     * @ORM\ManyToOne(targetEntity="World\Entity\Country")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="CountryCode", referencedColumnName="Code")
     * })
     */
    private $countrycode;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return City
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set district
     *
     * @param string $district
     * @return City
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * Get district
     *
     * @return string 
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * Set population
     *
     * @param integer $population
     * @return City
     */
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get population
     *
     * @return integer 
     */
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set countrycode
     *
     * @param \World\Entity\Country $countrycode
     * @return City
     */
    public function setCountrycode(\World\Entity\Country $countrycode = null)
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
    
    /**
     * To string
     *
     * @return string 
     */
    public function __toString() {
        return $this->name;
    }
}
