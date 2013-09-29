<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanInstance
 *
 * @ORM\Table(name="titan._instance")
 * @ORM\Entity
 */
class TitanInstance
{
    /**
     * @var string
     *
     * @ORM\Column(name="_unix", type="string", length=128, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._instance__unix_seq", allocationSize=1, initialValue=1)
     */
    private $unix;

    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=256, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="_description", type="string", length=1024, nullable=true)
     */
    private $description;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_create", type="datetimeutc", nullable=false)
     */
    private $create;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_update", type="datetimeutc", nullable=false)
     */
    private $update;

    /**
     * @var \Admin\Model\TitanFile
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanFile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="_logo", referencedColumnName="_id")
     * })
     */
    private $logo;

    /**
     * @var \Admin\Model\TitanUser
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="_user", referencedColumnName="_id")
     * })
     */
    private $user;



    /**
     * Get unix
     *
     * @return string 
     */
    public function getUnix()
    {
        return $this->unix;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TitanInstance
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
     * @return TitanInstance
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
     * Set create
     *
     * @param datetimeutc $create
     * @return TitanInstance
     */
    public function setCreate($create)
    {
        $this->create = $create;
    
        return $this;
    }

    /**
     * Get create
     *
     * @return datetimeutc 
     */
    public function getCreate()
    {
        return $this->create;
    }

    /**
     * Set update
     *
     * @param datetimeutc $update
     * @return TitanInstance
     */
    public function setUpdate($update)
    {
        $this->update = $update;
    
        return $this;
    }

    /**
     * Get update
     *
     * @return datetimeutc 
     */
    public function getUpdate()
    {
        return $this->update;
    }

    /**
     * Set logo
     *
     * @param \Admin\Model\TitanFile $logo
     * @return TitanInstance
     */
    public function setLogo(\Admin\Model\TitanFile $logo = null)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return \Admin\Model\TitanFile 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set user
     *
     * @param \Admin\Model\TitanUser $user
     * @return TitanInstance
     */
    public function setUser(\Admin\Model\TitanUser $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return \Admin\Model\TitanUser 
     */
    public function getUser()
    {
        return $this->user;
    }
}