<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use bonavall\BancdeltempsBundle\Entity\Persona;

/**
 * Hereda de la classe persona
 */

class Usuari extends Persona
{
    /**
     * @var integer     
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=55, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="cognom", type="string", length=55, nullable=false)
     */
    private $cognom;

    /**
     * @var string
     *
     * @ORM\Column(name="adreca", type="string", length=255, nullable=false)
     */
    private $adreca;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=15, nullable=false)
     */
    private $telefon;

    /**
     * @var string
     *
     * @ORM\Column(name="fotografia", type="string", length=255, nullable=false)
     */
    private $fotografia;

    /**
     * @var string
     *
     * @ORM\Column(name="presentacio", type="string", length=255, nullable=false)
     */
    private $presentacio;

    /**
     * @var integer
     *
     * @ORM\Column(name="punts", type="integer", nullable=false)
     */
    private $punts;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Persona_id", referencedColumnName="id")
     * })
     */
    private $persona;
    
    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=40, nullable=true)
     */
    private $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=75, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=false)
     */
    private $password;

    
    /**
     * @ORM\ManyToMany(targetEntity="Rol")
     * @ORM\JoinTable(name="persona_rol",
     *     joinColumns={@ORM\JoinColumn(name="persona_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="rol_id", referencedColumnName="id")}
     * )
     */
    private $rol;



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
     * @return Usuari
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
     * Set cognom
     *
     * @param string $cognom
     * @return Usuari
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get cognom
     *
     * @return string 
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * Set adreca
     *
     * @param string $adreca
     * @return Usuari
     */
    public function setAdreca($adreca)
    {
        $this->adreca = $adreca;

        return $this;
    }

    /**
     * Get adreca
     *
     * @return string 
     */
    public function getAdreca()
    {
        return $this->adreca;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return Usuari
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set fotografia
     *
     * @param string $fotografia
     * @return Usuari
     */
    public function setFotografia($fotografia)
    {
        $this->fotografia = $fotografia;

        return $this;
    }

    /**
     * Get fotografia
     *
     * @return string 
     */
    public function getFotografia()
    {
        return $this->fotografia;
    }

    /**
     * Set presentacio
     *
     * @param string $presentacio
     * @return Usuari
     */
    public function setPresentacio($presentacio)
    {
        $this->presentacio = $presentacio;

        return $this;
    }

    /**
     * Get presentacio
     *
     * @return string 
     */
    public function getPresentacio()
    {
        return $this->presentacio;
    }

    /**
     * Set punts
     *
     * @param integer $punts
     * @return Usuari
     */
    public function setPunts($punts)
    {
        $this->punts = $punts;

        return $this;
    }

    /**
     * Get punts
     *
     * @return integer 
     */
    public function getPunts()
    {
        return $this->punts;
    }

    /**
     * Set persona
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Persona $persona
     * @return Usuari
     */
    public function setPersona(\bonavall\BancdeltempsBundle\Entity\Persona $persona = null)
    {
        $this->persona = $persona;

        return $this;
    }

    /**
     * Get persona
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Persona 
     */
    public function getPersona()
    {
        return $this->persona;
    }
}
