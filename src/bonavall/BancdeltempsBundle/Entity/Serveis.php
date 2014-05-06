<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serveis
 *
 * @ORM\Table(name="serveis", indexes={@ORM\Index(name="fk_idusuari_iddonant", columns={"idDonant"}), @ORM\Index(name="fk_serveis_estat_servei1", columns={"estat_servei_id"}), @ORM\Index(name="fk_serveis_tipus_servei1", columns={"tipus_servei_id"})})
 * @ORM\Entity
 */
class Serveis
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
     * @var \EstatServei
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="EstatServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estat_servei_id", referencedColumnName="id")
     * })
     */
    private $estatServei;

    /**
     * @var \TipusServei
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="TipusServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipus_servei_id", referencedColumnName="id")
     * })
     */
    private $tipusServei;



    /**
     * Set id
     *
     * @param integer $id
     * @return Serveis
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
     * Set estatServei
     *
     * @param \bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei
     * @return Serveis
     */
    public function setEstatServei(\bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei)
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

    /**
     * Set tipusServei
     *
     * @param \bonavall\BancdeltempsBundle\Entity\TipusServei $tipusServei
     * @return Serveis
     */
    public function setTipusServei(\bonavall\BancdeltempsBundle\Entity\TipusServei $tipusServei)
    {
        $this->tipusServei = $tipusServei;

        return $this;
    }

    /**
     * Get tipusServei
     *
     * @return \bonavall\BancdeltempsBundle\Entity\TipusServei 
     */
    public function getTipusServei()
    {
        return $this->tipusServei;
    }
}
