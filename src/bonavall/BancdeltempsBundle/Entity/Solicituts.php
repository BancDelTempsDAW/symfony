<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicituts
 *
 * @ORM\Table(name="Solicituts", indexes={@ORM\Index(name="fk_usuari_has_serveis_usuari1", columns={"solicitant_id"}), @ORM\Index(name="fk_Solicituts_serveis1", columns={"servei_solicitat_id"})})
 * @ORM\Entity
 */
class Solicituts
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
     * @var integer
     *
     * @ORM\Column(name="estatSolicitut", type="integer", nullable=false)
     */
    private $estatsolicitut;

    /**
     * @var \Usuari
     *
     * @ORM\ManyToOne(targetEntity="Usuari")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="solicitant_id", referencedColumnName="id")
     * })
     */
    private $solicitant;

    /**
     * @var \Serveis
     *
     * @ORM\ManyToOne(targetEntity="Serveis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="servei_solicitat_id", referencedColumnName="id")
     * })
     */
    private $serveiSolicitat;



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
     * Set estatsolicitut
     *
     * @param integer $estatsolicitut
     * @return Solicituts
     */
    public function setEstatsolicitut($estatsolicitut)
    {
        $this->estatsolicitut = $estatsolicitut;

        return $this;
    }

    /**
     * Get estatsolicitut
     *
     * @return integer 
     */
    public function getEstatsolicitut()
    {
        return $this->estatsolicitut;
    }

    /**
     * Set solicitant
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $solicitant
     * @return Solicituts
     */
    public function setSolicitant(\bonavall\BancdeltempsBundle\Entity\Usuari $solicitant = null)
    {
        $this->solicitant = $solicitant;

        return $this;
    }

    /**
     * Get solicitant
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Usuari 
     */
    public function getSolicitant()
    {
        return $this->solicitant;
    }

    /**
     * Set serveiSolicitat
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Serveis $serveiSolicitat
     * @return Solicituts
     */
    public function setServeiSolicitat(\bonavall\BancdeltempsBundle\Entity\Serveis $serveiSolicitat = null)
    {
        $this->serveiSolicitat = $serveiSolicitat;

        return $this;
    }

    /**
     * Get serveiSolicitat
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Serveis 
     */
    public function getServeiSolicitat()
    {
        return $this->serveiSolicitat;
    }
}
