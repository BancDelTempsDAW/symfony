<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Missatges
 *
 * @ORM\Table(name="missatges", indexes={@ORM\Index(name="fk_missatges_Solicituts1", columns={"Solicituts_id"})})
 * @ORM\Entity
 */
class Missatges
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
     * @var string
     *
     * @ORM\Column(name="autor", type="string", length=55, nullable=false)
     */
    private $autor;

    /**
     * @var \Solicituts
     *
     * @ORM\ManyToOne(targetEntity="Solicituts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Solicituts_id", referencedColumnName="id")
     * })
     */
    private $solicituts;



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
     * Set autor
     *
     * @param string $autor
     * @return Missatges
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get autor
     *
     * @return string 
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set solicituts
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Solicituts $solicituts
     * @return Missatges
     */
    public function setSolicituts(\bonavall\BancdeltempsBundle\Entity\Solicituts $solicituts = null)
    {
        $this->solicituts = $solicituts;

        return $this;
    }

    /**
     * Get solicituts
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Solicituts 
     */
    public function getSolicituts()
    {
        return $this->solicituts;
    }
}
