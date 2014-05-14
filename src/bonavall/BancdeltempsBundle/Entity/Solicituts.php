<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicituts
 *
 * @ORM\Table(name="Solicituts", indexes={@ORM\Index(name="fk_usuari_has_serveis_usuari1", columns={"solicitant_id"}), @ORM\Index(name="fk_Solicituts_serveis1", columns={"servei_solicitat_id"}), @ORM\Index(name="Solicituts_ibfk_2", columns={"estatSolicitut"})})
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
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
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
     * @var \DateTime
     *
     * @ORM\Column(name="data_solicitut", type="date", nullable=false)
     */
    private $dataSolicitut;
    
    /**
     * @var \EstatServei
     *
     * @ORM\ManyToOne(targetEntity="EstatServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estatSolicitut", referencedColumnName="id")
     * })
     */
    private $estatSolicitut;



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
     * Set estatSolicitut
     *
     * @param \bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei
     * @return Solicituts
     */
    public function setEstatsolicitut(\bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei = null)
    {
        $this->estatSolicitut = $estatServei;

        return $this;
    }

    /**
     * Get estatSolicitut
     *
     * @return \bonavall\BancdeltempsBundle\Entity\EstatServei 
     */
    public function getEstatsolicitut()
    {
        return $this->estatSolicitut;
    }

    /**
     * Set solicitant
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Persona $solicitant
     * @return Solicituts
     */
    public function setSolicitant(\bonavall\BancdeltempsBundle\Entity\Persona $solicitant = null)
    {
        $this->solicitant = $solicitant;

        return $this;
    }

    /**
     * Get solicitant
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Persona 
     */
    public function getSolicitant()
    {
        return $this->solicitant;
    }
    
    public function getDataSolicitut() {
        return $this->dataSolicitut;
    }

    public function setDataSolicitut(\DateTime $dataSolicitut) {
        $this->dataSolicitut = $dataSolicitut;
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
