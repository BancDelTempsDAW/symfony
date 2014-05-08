<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Persona
 *
 * @ORM\Table(name="Persona", indexes={@ORM\Index(name="fk_Persona_rol1", columns={"rol_user_role"})})
 * @ORM\Entity
 */
class Persona
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
     * @ORM\Column(name="email", type="string", length=75, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=45, nullable=false)
     */
    private $password;

    /**
     * @var \Rol
     *
     * @ORM\ManyToOne(targetEntity="Rol")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rol_user_role", referencedColumnName="user_role")
     * })
     */
    private $rolUserRole;



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
     * Set email
     *
     * @param string $email
     * @return Persona
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Persona
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set rolUserRole
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rolUserRole
     * @return Persona
     */
    public function setRolUserRole(\bonavall\BancdeltempsBundle\Entity\Rol $rolUserRole = null)
    {
        $this->rolUserRole = $rolUserRole;

        return $this;
    }

    /**
     * Get rolUserRole
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Rol 
     */
    public function getRolUserRole()
    {
        return $this->rolUserRole;
    }
}
