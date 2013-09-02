<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanGroup
 *
 * @ORM\Table(name="titan._group")
 * @ORM\Entity
 */
class TitanGroup
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._group__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=32, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="_description", type="string", length=256, nullable=true)
     */
    private $description;

    /**
     * @var boolean
     *
     * @ORM\Column(name="_admin", type="boolean", nullable=false)
     */
    private $admin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="_chat", type="boolean", nullable=false)
     */
    private $chat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Admin\Model\TitanUser", mappedBy="group")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return TitanGroup
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return TitanGroup
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set admin
     *
     * @param boolean $admin
     * @return TitanGroup
     */
    public function setAdmin($admin)
    {
        $this->admin = $admin;
    
        return $this;
    }

    /**
     * Get admin
     *
     * @return boolean 
     */
    public function getAdmin()
    {
        return $this->admin;
    }

    /**
     * Set chat
     *
     * @param boolean $chat
     * @return TitanGroup
     */
    public function setChat($chat)
    {
        $this->chat = $chat;
    
        return $this;
    }

    /**
     * Get chat
     *
     * @return boolean 
     */
    public function getChat()
    {
        return $this->chat;
    }

    /**
     * Add user
     *
     * @param \Admin\Model\TitanUser $user
     * @return TitanGroup
     */
    public function addUser(\Admin\Model\TitanUser $user)
    {
        $this->user[] = $user;
    
        return $this;
    }

    /**
     * Remove user
     *
     * @param \Admin\Model\TitanUser $user
     */
    public function removeUser(\Admin\Model\TitanUser $user)
    {
        $this->user->removeElement($user);
    }

    /**
     * Get user
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUser()
    {
        return $this->user;
    }
}