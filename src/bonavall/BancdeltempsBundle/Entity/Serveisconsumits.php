<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serveisconsumits
 *
 * @ORM\Table(name="serveisconsumits", indexes={@ORM\Index(name="fk_idservei_oferit", columns={"idServei"}), @ORM\Index(name="fk_serveisconsumits_valoracio_servei1", columns={"valoracio_servei_id"}), @ORM\Index(name="FK_FB978542BDD3C65", columns={"idUsuari"})})
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
     * @var string
     *
     * @ORM\Column(name="comentaris", type="string", length=255, nullable=true)
     */
    private $comentaris;

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
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idUsuari", referencedColumnName="id")
     * })
     */
    private $idusuari;

    /**
     * @var \ValoracioServei
     *
     * @ORM\ManyToOne(targetEntity="ValoracioServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="valoracio_servei_id", referencedColumnName="id")
     * })
     */
    private $valoracioServei;



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
     * Set comentaris
     *
     * @param string $comentaris
     * @return Serveisconsumits
     */
    public function setComentaris($comentaris)
    {
        $this->comentaris = $comentaris;

        return $this;
    }

    /**
     * Get comentaris
     *
     * @return string 
     */
    public function getComentaris()
    {
        return $this->comentaris;
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

    /**
     * Set valoracioServei
     *
     * @param \bonavall\BancdeltempsBundle\Entity\ValoracioServei $valoracioServei
     * @return Serveisconsumits
     */
    public function setValoracioServei(\bonavall\BancdeltempsBundle\Entity\ValoracioServei $valoracioServei = null)
    {
        $this->valoracioServei = $valoracioServei;

        return $this;
    }

    /**
     * Get valoracioServei
     *
     * @return \bonavall\BancdeltempsBundle\Entity\ValoracioServei 
     */
    public function getValoracioServei()
    {
        return $this->valoracioServei;
    }
}
