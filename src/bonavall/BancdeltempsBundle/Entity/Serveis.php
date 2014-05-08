<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serveis
 *
 * @ORM\Table(name="serveis", indexes={@ORM\Index(name="fk_idusuari_iddonant", columns={"idDonant"}), @ORM\Index(name="fk_serveis_usuari1", columns={"usuari_ofertant_id"}), @ORM\Index(name="fk_serveis_tipus_servei1", columns={"tipus_servei_id1"}), @ORM\Index(name="fk_serveis_estat_servei1", columns={"estat_servei_id"})})
 * @ORM\Entity
 */
class Serveis
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
     * @ORM\Column(name="idDonant", type="integer", nullable=false)
     */
    private $iddonant;

    /**
     * @var integer
     *
     * @ORM\Column(name="preu", type="integer", nullable=false)
     */
    private $preu;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inici", type="date", nullable=false)
     */
    private $dataInici;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="durada", type="date", nullable=false)
     */
    private $durada;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_final", type="date", nullable=true)
     */
    private $dataFinal;

    /**
     * @var \Usuari
     *
     * @ORM\ManyToOne(targetEntity="Usuari")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuari_ofertant_id", referencedColumnName="id")
     * })
     */
    private $usuariOfertant;

    /**
     * @var \TipusServei
     *
     * @ORM\ManyToOne(targetEntity="TipusServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipus_servei_id1", referencedColumnName="id")
     * })
     */
    private $tipusServei1;

    /**
     * @var \EstatServei
     *
     * @ORM\ManyToOne(targetEntity="EstatServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estat_servei_id", referencedColumnName="id")
     * })
     */
    private $estatServei;



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
     * Set iddonant
     *
     * @param integer $iddonant
     * @return Serveis
     */
    public function setIddonant($iddonant)
    {
        $this->iddonant = $iddonant;

        return $this;
    }

    /**
     * Get iddonant
     *
     * @return integer 
     */
    public function getIddonant()
    {
        return $this->iddonant;
    }

    /**
     * Set preu
     *
     * @param integer $preu
     * @return Serveis
     */
    public function setPreu($preu)
    {
        $this->preu = $preu;

        return $this;
    }

    /**
     * Get preu
     *
     * @return integer 
     */
    public function getPreu()
    {
        return $this->preu;
    }

    /**
     * Set dataInici
     *
     * @param \DateTime $dataInici
     * @return Serveis
     */
    public function setDataInici($dataInici)
    {
        $this->dataInici = $dataInici;

        return $this;
    }

    /**
     * Get dataInici
     *
     * @return \DateTime 
     */
    public function getDataInici()
    {
        return $this->dataInici;
    }

    /**
     * Set durada
     *
     * @param \DateTime $durada
     * @return Serveis
     */
    public function setDurada($durada)
    {
        $this->durada = $durada;

        return $this;
    }

    /**
     * Get durada
     *
     * @return \DateTime 
     */
    public function getDurada()
    {
        return $this->durada;
    }

    /**
     * Set dataFinal
     *
     * @param \DateTime $dataFinal
     * @return Serveis
     */
    public function setDataFinal($dataFinal)
    {
        $this->dataFinal = $dataFinal;

        return $this;
    }

    /**
     * Get dataFinal
     *
     * @return \DateTime 
     */
    public function getDataFinal()
    {
        return $this->dataFinal;
    }

    /**
     * Set usuariOfertant
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $usuariOfertant
     * @return Serveis
     */
    public function setUsuariOfertant(\bonavall\BancdeltempsBundle\Entity\Usuari $usuariOfertant = null)
    {
        $this->usuariOfertant = $usuariOfertant;

        return $this;
    }

    /**
     * Get usuariOfertant
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Usuari 
     */
    public function getUsuariOfertant()
    {
        return $this->usuariOfertant;
    }

    /**
     * Set tipusServei1
     *
     * @param \bonavall\BancdeltempsBundle\Entity\TipusServei $tipusServei1
     * @return Serveis
     */
    public function setTipusServei1(\bonavall\BancdeltempsBundle\Entity\TipusServei $tipusServei1 = null)
    {
        $this->tipusServei1 = $tipusServei1;

        return $this;
    }

    /**
     * Get tipusServei1
     *
     * @return \bonavall\BancdeltempsBundle\Entity\TipusServei 
     */
    public function getTipusServei1()
    {
        return $this->tipusServei1;
    }

    /**
     * Set estatServei
     *
     * @param \bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei
     * @return Serveis
     */
    public function setEstatServei(\bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei = null)
    {
        $this->estatServei = $estatServei;

        return $this;
    }

    /**
     * Get estatServei
     *
     * @return \bonavall\BancdeltempsBundle\Entity\EstatServei 
     */
    public function getEstatServei()
    {
        return $this->estatServei;
    }
}
