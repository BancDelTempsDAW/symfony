<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Denuncies
 *
 * @ORM\Table(name="denuncies", indexes={@ORM\Index(name="denuncies_ibfk_1", columns={"denunciant"}), @ORM\Index(name="denuncies_ibfk_2", columns={"denunciat"})})
 * @ORM\Entity
 */
class Denuncies
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
     * @ORM\Column(name="motiu", type="text", nullable=false)
     */
    private $motiu;
    
    /**
     * @var string
     *
     * @ORM\Column(name="resolucio", type="text")
     */
    private $resolucio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datadenuncia", type="datetime", nullable=false)
     */
    private $dataDenuncia;
    
    

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="denunciant", referencedColumnName="id")
     * })
     */
    private $denunciant;
    
    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="denunciat", referencedColumnName="id")
     * })
     */
    private $denunciat;
   
    
    public function __construct() {
        
        $this->dataDenuncia = new \DateTime("now");
        
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
     * Set motiu
     *
     * @param string $missatge
     * @return Missatges
     */
    public function setMotiu($motiu)
    {
        $this->motiu = $motiu;

        return $this;
    }

    /**
     * Get motiu
     *
     * @return string 
     */
    public function getMotiu()
    {
        return $this->motiu;
    }

    /**
     * Set dataDenuncia
     *
     * @param \DateTime $dataDenuncia
     * @return Denuncies
     */
    public function setDataDenuncia($dataDenuncia)
    {
        $this->dataDenuncia = $dataDenuncia;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getDataDenuncia()
    {
        return $this->dataDenuncia;
    }
    
    /**
     * Set resolucio
     *
     * @param string $resolucio
     * @return Denuncies
     */
    public function setResolucio($resolucio)
    {
        $this->resolucio = $resolucio;

        return $this;
    }

    /**
     * Get resolucio
     *
     * @return string 
     */
    public function getResolucio()
    {
        return $this->resolucio;
    }
    

    
    /**
     * Set denunciat
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Persona $denunciat
     * @return Denuncies
     */
    public function setDenunciat(\bonavall\BancdeltempsBundle\Entity\Persona $denunciat = null)
    {
        $this->denunciat  = $denunciat;

        return $this;
    }

    /**
     * Get denunciat 
     * 
     * @return \bonavall\BancdeltempsBundle\Entity\Persona 
     */
    public function getDenunciat()
    {
        return $this->denunciat ;
    }
    
    
    /**
     * Set denunciant
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Persona $denunciant
     * @return Denuncies
     */
    public function setDenunciant(\bonavall\BancdeltempsBundle\Entity\Persona $denunciant = null)
    {
        $this->denunciant  = $denunciant;

        return $this;
    }

    /**
     * Get denunciant 
     * 
     * @return \bonavall\BancdeltempsBundle\Entity\Persona 
     */
    public function getDenunciant()
    {
        return $this->denunciant ;
    }

    
}
