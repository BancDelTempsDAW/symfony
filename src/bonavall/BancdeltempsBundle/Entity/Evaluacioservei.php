<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evaluacioservei
 *
 * @ORM\Table(name="EvaluacioServei", indexes={@ORM\Index(name="fk_usuari_has_serveis_serveis2", columns={"serveis_id", "serveis_tipus_servei_id", "serveis_estat_servei_id"}), @ORM\Index(name="fk_usuari_has_serveis_usuari2", columns={"usuari_id"}), @ORM\Index(name="IDX_C2BD0F3DA55C797F", columns={"serveis_id"})})
 * @ORM\Entity
 */
class Evaluacioservei
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
     * @ORM\Column(name="serveis_tipus_servei_id", type="integer", nullable=false)
     */
    private $serveisTipusServeiId;

    /**
     * @var integer
     *
     * @ORM\Column(name="serveis_estat_servei_id", type="integer", nullable=false)
     */
    private $serveisEstatServeiId;

    /**
     * @var integer
     *
     * @ORM\Column(name="valoracioServei", type="integer", nullable=false)
     */
    private $valoracioservei;

    /**
     * @var string
     *
     * @ORM\Column(name="Comentari", type="string", length=45, nullable=true)
     */
    private $comentari;

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
     *   @ORM\JoinColumn(name="serveis_id", referencedColumnName="id")
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
     * Set serveisTipusServeiId
     *
     * @param integer $serveisTipusServeiId
     * @return Evaluacioservei
     */
    public function setServeisTipusServeiId($serveisTipusServeiId)
    {
        $this->serveisTipusServeiId = $serveisTipusServeiId;

        return $this;
    }

    /**
     * Get serveisTipusServeiId
     *
     * @return integer 
     */
    public function getServeisTipusServeiId()
    {
        return $this->serveisTipusServeiId;
    }

    /**
     * Set serveisEstatServeiId
     *
     * @param integer $serveisEstatServeiId
     * @return Evaluacioservei
     */
    public function setServeisEstatServeiId($serveisEstatServeiId)
    {
        $this->serveisEstatServeiId = $serveisEstatServeiId;

        return $this;
    }

    /**
     * Get serveisEstatServeiId
     *
     * @return integer 
     */
    public function getServeisEstatServeiId()
    {
        return $this->serveisEstatServeiId;
    }

    /**
     * Set valoracioservei
     *
     * @param integer $valoracioservei
     * @return Evaluacioservei
     */
    public function setValoracioservei($valoracioservei)
    {
        $this->valoracioservei = $valoracioservei;

        return $this;
    }

    /**
     * Get valoracioservei
     *
     * @return integer 
     */
    public function getValoracioservei()
    {
        return $this->valoracioservei;
    }

    /**
     * Set comentari
     *
     * @param string $comentari
     * @return Evaluacioservei
     */
    public function setComentari($comentari)
    {
        $this->comentari = $comentari;

        return $this;
    }

    /**
     * Get comentari
     *
     * @return string 
     */
    public function getComentari()
    {
        return $this->comentari;
    }

    /**
     * Set usuari
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Usuari $usuari
     * @return Evaluacioservei
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
     * @return Evaluacioservei
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
