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


}
