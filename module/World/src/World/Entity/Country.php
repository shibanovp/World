<?php

namespace World\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Country
 *
 * @ORM\Table(name="country")
 * @ORM\Entity
 */
class Country
{
    /**
     * @var string
     *
     * @ORM\Column(name="Code", type="string", length=3, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $code = '';

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="string", length=52, nullable=false)
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="Region", type="string", length=26, nullable=false)
     */
    private $region = '';

    /**
     * @var float
     *
     * @ORM\Column(name="SurfaceArea", type="float", precision=10, scale=2, nullable=false)
     */
    private $surfacearea = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="IndepYear", type="smallint", nullable=true)
     */
    private $indepyear;

    /**
     * @var integer
     *
     * @ORM\Column(name="Population", type="integer", nullable=false)
     */
    private $population = '0';

    /**
     * @var float
     *
     * @ORM\Column(name="LifeExpectancy", type="float", precision=3, scale=1, nullable=true)
     */
    private $lifeexpectancy;

    /**
     * @var float
     *
     * @ORM\Column(name="GNP", type="float", precision=10, scale=2, nullable=true)
     */
    private $gnp;

    /**
     * @var float
     *
     * @ORM\Column(name="GNPOld", type="float", precision=10, scale=2, nullable=true)
     */
    private $gnpold;

    /**
     * @var string
     *
     * @ORM\Column(name="LocalName", type="string", length=45, nullable=false)
     */
    private $localname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="GovernmentForm", type="string", length=45, nullable=false)
     */
    private $governmentform = '';

    /**
     * @var string
     *
     * @ORM\Column(name="HeadOfState", type="string", length=60, nullable=true)
     */
    private $headofstate;

    /**
     * @var integer
     *
     * @ORM\Column(name="Capital", type="integer", nullable=true)
     */
    private $capital;

    /**
     * @var string
     *
     * @ORM\Column(name="Code2", type="string", length=2, nullable=false)
     */
    private $code2 = '';

    /**
     * @var string
     *
     * @ORM\Column(name="Continent", type="string", length=13, nullable=false)
     */
    private $continent;


}
