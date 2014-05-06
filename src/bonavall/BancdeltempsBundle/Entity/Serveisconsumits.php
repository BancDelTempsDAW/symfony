<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serveisconsumits
 *
 * @ORM\Table(name="serveisconsumits", indexes={@ORM\Index(name="fk_idservei_oferit", columns={"idServei"}), @ORM\Index(name="fk_idusuari_consumidor", columns={"idUsuari"})})
 * @ORM\Entity
 */
class Serveisconsumits
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
     * @var \Serveis
     *
     * @ORM\ManyToOne(targetEntity="Serveis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idServei", referencedColumnName="id")
     * })
     */
    private $idservei;

    /**
     * @var \Usuari
     *
     * @ORM\ManyToOne(targetEntity="Usuari")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUsuari", referencedColumnName="id")
     * })
     */
    private $idusuari;



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
     * Set idservei
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Serveis $idservei
     * @return Serveisconsumits
     */
    public function setIdservei(\bonavall\BancdeltempsBundle\Entity\Serveis $idservei = null)
    {
        $this->idservei = $idservei;

        return $this;
    }

    /**
     * Get idservei
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Serveis 
     */
    public function getIdservei()
    {
        return $this->idservei;
    }

    /**
     * Set idusuari
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $idusuari
     * @return Serveisconsumits
     */
    public function setIdusuari(\bonavall\BancdeltempsBundle\Entity\Usuari $idusuari = null)
    {
        $this->idusuari = $idusuari;

        return $this;
    }

    /**
     * Get idusuari
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Usuari 
     */
    public function getIdusuari()
    {
        return $this->idusuari;
    }
}
