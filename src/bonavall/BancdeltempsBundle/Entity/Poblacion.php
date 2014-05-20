<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poblacion
 *
 * @ORM\Table(name="poblacion", indexes={@ORM\Index(name="poblacion_ibfk_1", columns={"idprovincia"})})
 * @ORM\Entity
 */
class Poblacion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idpoblacion", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id; 
    

    /**
     * @var \Provincia
     *
     * @ORM\ManyToOne(targetEntity="Provincia")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idprovincia", referencedColumnName="idprovincia")
     * })
     */
    private $idProvincia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="poblacion", type="string", length=110, nullable=false)
     */
    private $poblacio;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="postal", type="integer", nullable=false)
     */
    private $codiPostal;
    

    public function getId() {
        return $this->id;
    }

    public function getIdProvincia() {
        return $this->idProvincia;
    }

    public function setIdProvincia(\bonavall\BancdeltempsBundle\Entity\Provincia $idProvincia = null) {
        $this->idProvincia = $idProvincia;
        return $this;
    }

    public function getPoblacio() {
        return $this->poblacio;
    }

    public function setPoblacio($poblacio) {
        $this->poblacio = $poblacio;
    }

    public function getCodiPostal() {
        return $this->codiPostal;
    }

    public function setCodiPostal($codiPostal) {
        $this->codiPostal = $codiPostal;
    }
    
    public function __toString() {
        return $this->poblacio;
    }



    
}
