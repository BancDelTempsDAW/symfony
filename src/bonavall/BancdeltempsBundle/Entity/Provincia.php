<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Provincia
 * @ORM\Entity
 * @ORM\Table(name="provincia")
 * 
 */
 
class Provincia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idprovincia", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id; 
    
    /**
     * @var string
     *
     * @ORM\Column(name="provincia", type="string", length=50, nullable=false)
     */
    private $provincia;
    
    /**
     * @var string
     *
     * @ORM\Column(name="provinciaseo", type="string", length=50, nullable=false)
     */
    private $provinciaseo;
    
    
    public function getId() {
        return $this->id;
    }

        
    public function getProvincia() {
        return $this->provincia;
    }

    public function setProvincia($provincia) {
        $this->provincia = $provincia;
    }

    public function getProvinciaseo() {
        return $this->provinciaseo;
    }

    public function setProvinciaseo($provinciaseo) {
        $this->provinciaseo = $provinciaseo;
    }
    
    public function __toString() {
        return $this->provincia;
    }



}
