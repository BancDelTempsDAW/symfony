<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usuari
 *
 * @ORM\Table(name="usuari", indexes={@ORM\Index(name="fk_usuari_grup1", columns={"grup_id"})})
 * @ORM\Entity
 */
class Usuari
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
     * @ORM\Column(name="nom", type="string", length=55, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="cognom", type="string", length=55, nullable=false)
     */
    private $cognom;

    /**
     * @var \Grup
     *
     * @ORM\ManyToOne(targetEntity="Grup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="grup_id", referencedColumnName="id")
     * })
     */
    private $grup;



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
     * Set nom
     *
     * @param string $nom
     * @return Usuari
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set cognom
     *
     * @param string $cognom
     * @return Usuari
     */
    public function setCognom($cognom)
    {
        $this->cognom = $cognom;

        return $this;
    }

    /**
     * Get cognom
     *
     * @return string 
     */
    public function getCognom()
    {
        return $this->cognom;
    }

    /**
     * Set grup
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Grup $grup
     * @return Usuari
     */
    public function setGrup(\bonavall\BancdeltempsBundle\Entity\Grup $grup = null)
    {
        $this->grup = $grup;

        return $this;
    }

    /**
     * Get grup
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Grup 
     */
    public function getGrup()
    {
        return $this->grup;
    }
}
