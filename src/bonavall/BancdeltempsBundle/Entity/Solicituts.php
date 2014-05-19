<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Solicituts
 *
 * @ORM\Table(name="Solicituts", indexes={@ORM\Index(name="fk_usuari_has_serveis_usuari1", columns={"solicitant_id"}), @ORM\Index(name="fk_Solicituts_serveis1", columns={"servei_solicitat_id"}), @ORM\Index(name="estatSolicitut", columns={"estatSolicitut"})})
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
     * @ORM\Column(name="servei_solicitat_id", type="integer", nullable=true)
     */
    private $serveiSolicitatId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_solicitut", type="datetime", nullable=false)
     */
    private $dataSolicitut;

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


}
