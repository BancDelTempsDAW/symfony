<?php

namespace bonavall\BancdeltempsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use bonavall\BancdeltempsBundle\Entity\Persona;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Usuari
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="usuari")
 * 
 */

class Usuari extends Persona
{
    /**
     * @var integer     
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @var string
     *
     * @ORM\Column(name="adreca", type="string", length=255, nullable=false)
     */
    private $adreca;

    /**
     * @var string
     *
     * @ORM\Column(name="telefon", type="string", length=15, nullable=false)
     */
    private $telefon;

      /**
     * @var string $fotografia
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Si us plau, puja una imatge vàlida")
     * @ORM\Column(name="fotografia", type="string", length=255, nullable=false)
     */
    protected $fotografia;

    /**
     * @var string
     *
     * @ORM\Column(name="presentacio", type="string", length=255, nullable=false)
     */
    private $presentacio;

    /**
     * @var integer
     *
     * @ORM\Column(name="punts", type="integer", nullable=false)
     */
    private $punts;
    
    /**
     * @var string
     *
     * @ORM\Column(name="salt", type="string", length=40, nullable=true)
     */
    protected $salt;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=75, nullable=false)
     */
    protected $email;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=60, nullable=false)
     */
    protected $password;

    
    /**
     * @ORM\ManyToMany(targetEntity="Rol")
     * @ORM\JoinTable(name="persona_rol",
     *     joinColumns={@ORM\JoinColumn(name="persona_id", referencedColumnName="id")},
     *     inverseJoinColumns={@ORM\JoinColumn(name="rol_id", referencedColumnName="id")}
     * )
     */
    protected $rol;
    
    
    public function __construct()
    {
        
        $this->isActive = true;
        $this->salt = md5(uniqid(null, true));
        
        
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
     * Set adreca
     *
     * @param string $adreca
     * @return Usuari
     */
    public function setAdreca($adreca)
    {
        $this->adreca = $adreca;

        return $this;
    }

    /**
     * Get adreca
     *
     * @return string 
     */
    public function getAdreca()
    {
        return $this->adreca;
    }

    /**
     * Set telefon
     *
     * @param string $telefon
     * @return Usuari
     */
    public function setTelefon($telefon)
    {
        $this->telefon = $telefon;

        return $this;
    }

    /**
     * Get telefon
     *
     * @return string 
     */
    public function getTelefon()
    {
        return $this->telefon;
    }

    /**
     * Set fotografia
     *
     * @param string $fotografia
     * @return Usuari
     */
    public function setFotografia($fotografia)
    {
        $this->fotografia = $fotografia;

        return $this;
    }

    /**
     * Get fotografia
     *
     * @return string 
     */
    public function getFotografia()
    {
        return $this->fotografia;
    }

    /**
     * Set presentacio
     *
     * @param string $presentacio
     * @return Usuari
     */
    public function setPresentacio($presentacio)
    {
        $this->presentacio = $presentacio;

        return $this;
    }

    /**
     * Get presentacio
     *
     * @return string 
     */
    public function getPresentacio()
    {
        return $this->presentacio;
    }

    /**
     * Set punts
     *
     * @param integer $punts
     * @return Usuari
     */
    public function setPunts($punts)
    {
        $this->punts = $punts;

        return $this;
    }

    /**
     * Get punts
     *
     * @return integer 
     */
    public function getPunts()
    {
        return $this->punts;
    }

   

    /**
     * Set salt
     *
     * @param string $salt
     * @return Usuari
     */
    public function setSalt($salt)
    {
        $this->salt = $salt;

        return $this;
    }

    /**
     * Get salt
     *
     * @return string 
     */
    public function getSalt()
    {
        return Null;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Usuari
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
     * @return Usuari
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
     * Add rol
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rol
     * @return Usuari
     */
    public function addRol(\bonavall\BancdeltempsBundle\Entity\Rol $rol)
    {
        $this->rol[] = $rol;

        return $this;
    }

    /**
     * Remove rol
     *
     * @param \bonavall\BancdeltempsBundle\Entity\Rol $rol
     */
    public function removeRol(\bonavall\BancdeltempsBundle\Entity\Rol $rol)
    {
        $this->rol->removeElement($rol);
    }

    /**
     * Get rol
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRol()
    {
        return $this->rol;
    }
    
    public function isEnabled() {
        return parent::isEnabled();
    }
    
    
    /*****************************************************************************
    *                               Gestio de la fotografia
    /*******************************************************************************/
    
        public function getFullImagePath() {
        return null === $this->fotografia ? null : $this->getUploadRootDir(). $this->fotografia;
    }
 
    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return $this->getTmpUploadRootDir().$this->getId()."/";
    }
 
    protected function getTmpUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/';
    }
 
    /**
     * @ORM\PrePersist()
     * @ORM\PreUpdate()
     */
    public function uploadImage() {
        // the file property can be empty if the field is not required
        if (null === $this->fotografia) {
            return;
        }
        if(!$this->id){
            $this->fotografia->move($this->getTmpUploadRootDir(), $this->fotografia->getClientOriginalName());
        }else{
            $this->fotografia->move($this->getUploadRootDir(), $this->fotografia->getClientOriginalName());
        }
        $this->setFotografia($this->fotografia->getClientOriginalName());
    }
 
    /**
     * @ORM\PostPersist()
     */
    public function moveImage()
    {
        if (null === $this->fotografia) {
            return;
        }
        if(!is_dir($this->getUploadRootDir())){
            mkdir($this->getUploadRootDir());
        }
        copy($this->getTmpUploadRootDir().$this->fotografia, $this->getFullImagePath());
        unlink($this->getTmpUploadRootDir().$this->fotografia);
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeImage()
    {
        unlink($this->getFullImagePath());
        rmdir($this->getUploadRootDir());
    }


}
