<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicituts
 *
 * @ORM\Table(name="Solicituts", indexes={@ORM\Index(name="fk_usuari_has_serveis_serveis1", columns={"serveis_id", "serveis_tipus_servei_id", "serveis_estat_servei_id"}), @ORM\Index(name="fk_usuari_has_serveis_usuari1", columns={"usuari_id"})})
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
     *   @ORM\JoinColumn(name="usuari_id", referencedColumnName="id")
     * })
     */
    private $usuari;

    /**
     * @var \Serveis
     *
     * @ORM\ManyToOne(targetEntity="Serveis")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="serveis_id", referencedColumnName="id"),
     *   @ORM\JoinColumn(name="serveis_tipus_servei_id", referencedColumnName="tipus_servei_id"),
     *   @ORM\JoinColumn(name="serveis_estat_servei_id", referencedColumnName="estat_servei_id")
     * })
     */
    private $serveis;



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
     * Set usuari
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $usuari
     * @return Solicituts
     */
    public function setUsuari(\bonavall\BancdeltempsBundle\Entity\Usuari $usuari = null)
    {
        $this->usuari = $usuari;

        return $this;
    }

    /**
     * Get usuari
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Usuari 
     */
    public function getUsuari()
    {
        return $this->usuari;
    }

    /**
     * Set serveis
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Serveis $serveis
     * @return Solicituts
     */
    public function setServeis(\bonavall\BancdeltempsBundle\Entity\Serveis $serveis = null)
    {
        $this->serveis = $serveis;

        return $this;
    }

    /**
     * Get serveis
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Serveis 
     */
    public function getServeis()
    {
        return $this->serveis;
    }
}
