<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Serveis
 *
 * @ORM\Table(name="serveis", indexes={@ORM\Index(name="fk_idusuari_iddonant", columns={"idDonant"}), @ORM\Index(name="fk_serveis_tipus_servei1", columns={"tipus_servei_id1"}), @ORM\Index(name="fk_serveis_estat_servei1", columns={"estat_servei_id"}), @ORM\Index(name="serveis_ibfk_3", columns={"poblacio_id"})})
 * @ORM\Entity
 */
class Serveis {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var \Persona
     *
     * @ORM\ManyToOne(targetEntity="Persona")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDonant", referencedColumnName="id")
     * })
     */
    private $iddonant;

    /**
     * @var integer
     *
     * @ORM\Column(name="punts", type="integer", nullable=false)
     */
    private $punts;

    /**
     * @var string
     *
     * @ORM\Column(name="nomServei", type="string", length=55, nullable=false)
     */
    private $nomServei;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcioServei", type="text", length=255, nullable=false)
     */
    private $descripcioServei;

    /**
     * @var \Poblacion
     *
     * @ORM\ManyToOne(targetEntity="Poblacion")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poblacio_id", referencedColumnName="idpoblacion", nullable=false)
     * })
     */
    private $poblacio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_inici", type="date", nullable=false)
     */
    private $dataInici;

    /**
     * @var \integer
     *
     * @ORM\Column(name="durada", type="integer", nullable=false)
     */
    private $durada;

    /**
     * @var \DateTime
     * 
     * @ORM\Column(name="data_final", type="date", nullable=false)
     */
    private $dataFinal;

    /**
     * @var \TipusServei
     *
     * @ORM\ManyToOne(targetEntity="TipusServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="tipus_servei_id1", referencedColumnName="id", nullable=false)
     * })
     */
    private $tipusServei1;

    /**
     * @var \EstatServei
     *
     * @ORM\ManyToOne(targetEntity="EstatServei")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="estat_servei_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $estatServei;

    public function __construct() {
        $this->dataInici = new \DateTime("now");
        $final = new \DateTime("now");
        date_add($final, date_interval_create_from_date_string('365 days'));
        $this->dataFinal = $final;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    public function getNomServei() {
        return $this->nomServei;
    }

    public function setNomServei($nomServei) {
        $this->nomServei = $nomServei;
    }

    /**
     * Set iddonant
     *
     * @param integer $iddonant
     * @return Serveis
     */
    public function setIddonant($iddonant) {
        $this->iddonant = $iddonant;

        return $this;
    }

    /**
     * Get iddonant
     *
     * @return integer 
     */
    public function getIddonant() {
        return $this->iddonant;
    }

    /**
     * Set punts
     *
     * @param integer $punts
     * @return Serveis
     */
    public function setPunts($punts) {
        $this->punts = $punts;

        return $this;
    }

    /**
     * Get punts
     *
     * @return integer 
     */
    public function getPunts() {
        return $this->punts;
    }

    public function getDescripcioServei() {
        return $this->descripcioServei;
    }

    public function setDescripcioServei($descripcioServei) {
        $this->descripcioServei = $descripcioServei;
    }

    /**
     * Set dataInici
     *
     * @param \DateTime $dataInici
     * @return Serveis
     */
    public function setDataInici($dataInici) {
        $this->dataInici = $dataInici;

        return $this;
    }

    /**
     * Get dataInici
     *
     * @return \DateTime 
     */
    public function getDataInici() {
        return $this->dataInici;
    }

    public function getPoblacio() {
        return $this->poblacio;
    }

    public function setPoblacio($poblacio) {
        $this->poblacio = $poblacio;
    }

    /**
     * Set durada
     *
     * @param \DateTime $durada
     * @return Serveis
     */
    public function setDurada($durada) {
        $this->durada = $durada;

        return $this;
    }

    /**
     * Get durada
     *
     * @return \DateTime 
     */
    public function getDurada() {
        return $this->durada;
    }

    /**
     * Set dataFinal
     *
     * @param \DateTime $dataFinal
     * @return Serveis
     */
    public function setDataFinal($dataFinal) {
        $this->dataFinal = $dataFinal;

        return $this;
    }

    /**
     * Get dataFinal
     *
     * @return \DateTime 
     */
    public function getDataFinal() {
        return $this->dataFinal;
    }

    /**
     * Set tipusServei1
     *
     * @param \bonavall\BancdeltempsBundle\Entity\TipusServei $tipusServei1
     * @return Serveis
     */
    public function setTipusServei1(\bonavall\BancdeltempsBundle\Entity\TipusServei $tipusServei1 = null) {
        $this->tipusServei1 = $tipusServei1;

        return $this;
    }

    /**
     * Get tipusServei1
     *
     * @return \bonavall\BancdeltempsBundle\Entity\TipusServei 
     */
    public function getTipusServei1() {
        return $this->tipusServei1;
    }

    /**
     * Set estatServei
     *
     * @param \bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei
     * @return Serveis
     */
    public function setEstatServei(\bonavall\BancdeltempsBundle\Entity\EstatServei $estatServei = null) {
        $this->estatServei = $estatServei;

        return $this;
    }

    /**
     * Get estatServei
     *
     * @return \bonavall\BancdeltempsBundle\Entity\EstatServei 
     */
    public function getEstatServei() {
        return $this->estatServei;
    }

    /**
     * @Assert\True(message = "La data final no pot ser superior a la inicial")
     */
    public function isDatesValid() {
        return ($this->dataInici < $this->dataFinal);
    }
    
    /**
     * @Assert\True(message = "La data final no pot ser superior a un any")
     */
    public function isAnyValid() {
        $final = new \DateTime("now");
        date_add($final, date_interval_create_from_date_string('365 days'));
        return ( $this->dataFinal < $final );
    }
    
    /**
     * @Assert\True(message = "La data inicial no pot ser mes petita que avui")
     */
    public function isIniciValid() {
        $inici = new \DateTime("now");       
        return ( $this->dataInici < $inici );
    }

    public function __toString() {
        return $this->nomServei;
    }

}
