<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Persona
 *
 * @ORM\Table(name="Persona")
 * @ORM\Entity
 * @UniqueEntity(fields="email", message="Aquest email ja està registrat")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string");
 * @ORM\DiscriminatorMap({"persona" = "Persona", "usuari" = "Usuari"})
 */
class Persona implements AdvancedUserInterface, \Serializable {

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=40, nullable=true)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", unique=true, length=75, nullable=false)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=255, nullable=false)
     */
    protected $password;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="actiu", type="boolean", nullable=false)
     */
    protected $isActive;

    /**
     * @ORM\ManyToMany(targetEntity="Rol")
     * @ORM\JoinTable(name="persona_rol",
     *     joinColumns={@ORM\JoinColumn(name="persona_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="rol_id", referencedColumnName="id")}
     * )
     */
    protected $rol;

    public function __construct() {
        //$this->isActive = true;
        $this->salt = md5(uniqid(null, true));        
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set salt
     *
     * @param string $salt
     * @return Persona
     */
    public function setSalt($salt) {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt() {
        return Null;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Persona
     */
    public function setEmail($email) {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Persona
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set rol
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rol
     * @return Persona
     */
    public function setRol(\bonavall\BancdeltempsBundle\Entity\Rol $rol = null) {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get rol
     *
     * @return \bonavall\BancdeltempsBundle\Entity\Rol 
     */
    public function getRol() {
        return $this->rol;
    }

    public function eraseCredentials() {
        
    }

    public function getRoles() {
        //return array('ROLE_USER');
        $roles = array();
        foreach ($this->rol as $role) {
            $roles[] = $role->getRole();
        }

        return $roles;
    }

    public function getUsername() {
        return $this->getEmail();
    }

    public function serialize() {
        return serialize(array(
            $this->id,
            $this->email,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt,
        ));
        
    }

    public function unserialize($serialized) {
        
        list (
            $this->id,
            $this->email,
            $this->password,
            $this->isActive,
            // see section on salt below
            // $this->salt
        ) = unserialize($serialized);
    }

    /**
     * Add rol
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rol
     * @return Persona
     */
    public function addRol(\bonavall\BancdeltempsBundle\Entity\Rol $rol) {
        $this->rol[] = $rol;

        return $this;
    }

    /**
     * Remove rol
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rol
     */
    public function removeRol(\bonavall\BancdeltempsBundle\Entity\Rol $rol) {
        $this->rol->removeElement($rol);
    }

    /**
     * Add rol_id
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rolId
     * @return Persona
     */
    public function addRolId(\bonavall\BancdeltempsBundle\Entity\Rol $rolId) {
        $this->rol_id[] = $rolId;

        return $this;
    }

    /**
     * Remove rol_id
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rolId
     */
    public function removeRolId(\bonavall\BancdeltempsBundle\Entity\Rol $rolId) {
        $this->rol_id->removeElement($rolId);
    }

    /**
     * Get rol_id
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRolId() {
        return $this->rol_id;
    }

    public function __toString() {
        return $this->email;
    }
    
    public function getIsActive() {
        return $this->isActive;
    }

    public function setIsActive($isActive) {
        $this->isActive = $isActive;
    }
    
    public function isEnabled() {        
        return $this->isActive;
    }

    public function isAccountNonExpired() {
        return true;
    }

    public function isAccountNonLocked() {
        return true;
    }

    public function isCredentialsNonExpired() {
        return true;
    }
    
    

}
