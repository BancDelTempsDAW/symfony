<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Missatges
 *
 * @ORM\Table(name="missatges", indexes={@ORM\Index(name="fk_idusuari_idemisor", columns={"idEmisor"}), @ORM\Index(name="fk_idusuari_idreceptor", columns={"idReceptor"})})
 * @ORM\Entity
 */
class Missatges
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="missatge", type="text", nullable=false)
     */
    private $missatge;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data", type="date", nullable=false)
     */
    private $data;

    /**
     * @var \Usuari
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuari")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idReceptor", referencedColumnName="id")
     * })
     */
    private $idreceptor;

    /**
     * @var \Usuari
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Usuari")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idEmisor", referencedColumnName="id")
     * })
     */
    private $idemisor;



    /**
     * Set id
     *
     * @param integer $id
     * @return Missatges
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
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
     * Set missatge
     *
     * @param string $missatge
     * @return Missatges
     */
    public function setMissatge($missatge)
    {
        $this->missatge = $missatge;

        return $this;
    }

    /**
     * Get missatge
     *
     * @return string 
     */
    public function getMissatge()
    {
        return $this->missatge;
    }

    /**
     * Set data
     *
     * @param \DateTime $data
     * @return Missatges
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return \DateTime 
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Set idreceptor
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $idreceptor
     * @return Missatges
     */
    public function setIdreceptor(\bonavall\BancdeltempsBundle\Entity\Usuari $idreceptor)
    {
        $this->idreceptor = $idreceptor;

        return $this;
    }

    /**
     * Get idreceptor
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Usuari 
     */
    public function getIdreceptor()
    {
        return $this->idreceptor;
    }

    /**
     * Set idemisor
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $idemisor
     * @return Missatges
     */
    public function setIdemisor(\bonavall\BancdeltempsBundle\Entity\Usuari $idemisor)
    {
        $this->idemisor = $idemisor;

        return $this;
    }

    /**
     * Get idemisor
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Usuari 
     */
    public function getIdemisor()
    {
        return $this->idemisor;
    }
}
