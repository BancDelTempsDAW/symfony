<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bancdeltemps
 *
 * @ORM\Table(name="bancdeltemps", uniqueConstraints={@ORM\UniqueConstraint(name="nom_UNIQUE", columns={"nom"})})
 * @ORM\Entity
 */
class Bancdeltemps
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=45, nullable=false)
     */
    private $nom;

    /**
     * @var integer
     *
     * @ORM\Column(name="saldo_minim", type="integer", nullable=false)
     */
    private $saldoMinim;

    /**
     * @var integer
     *
     * @ORM\Column(name="temps_inactivitat", type="integer", nullable=false)
     */
    private $tempsInactivitat;

    function __construct()
    {

        $this->saldoMinim = 5;

    }


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
     * Set nom
     *
     * @param string $nom
     * @return Bancdeltemps
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set saldoMinim
     *
     * @param integer $saldoMinim
     * @return Bancdeltemps
     */
    public function setSaldoMinim($saldoMinim)
    {
        $this->saldoMinim = $saldoMinim;

        return $this;
    }

    /**
     * Get saldoMinim
     *
     * @return integer 
     */
    public function getSaldoMinim()
    {
        return $this->saldoMinim;
    }

    /**
     * Set tempsInactivitat
     *
     * @param integer $tempsInactivitat
     * @return Bancdeltemps
     */
    public function setTempsInactivitat($tempsInactivitat)
    {
        $this->tempsInactivitat = $tempsInactivitat;

        return $this;
    }

    /**
     * Get tempsInactivitat
     *
     * @return integer 
     */
    public function getTempsInactivitat()
    {
        return $this->tempsInactivitat;
    }
}
