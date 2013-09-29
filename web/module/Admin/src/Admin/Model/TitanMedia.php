<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanMedia
 *
 * @ORM\Table(name="titan._media")
 * @ORM\Entity
 */
class TitanMedia
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._media__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=256, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="_mimetype", type="string", length=32, nullable=false)
     */
    private $mimetype;

    /**
     * @var integer
     *
     * @ORM\Column(name="_size", type="integer", nullable=false)
     */
    private $size;

    /**
     * @var string
     *
     * @ORM\Column(name="_description", type="string", length=256, nullable=true)
     */
    private $description;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_insert", type="datetimeutc", nullable=false)
     */
    private $insert;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_update", type="datetimeutc", nullable=false)
     */
    private $update;

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
     * @return TitanMedia
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
     * Set mimetype
     *
     * @param string $mimetype
     * @return TitanMedia
     */
    public function setMimetype($mimetype)
    {
        $this->mimetype = $mimetype;
    
        return $this;
    }

    /**
     * Get mimetype
     *
     * @return string 
     */
    public function getMimetype()
    {
        return $this->mimetype;
    }

    /**
     * Set size
     *
     * @param integer $size
     * @return TitanMedia
     */
    public function setSize($size)
    {
        $this->size = $size;
    
        return $this;
    }

    /**
     * Get size
     *
     * @return integer 
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return TitanMedia
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
     * Set insert
     *
     * @param datetimeutc $insert
     * @return TitanMedia
     */
    public function setInsert($insert)
    {
        $this->insert = $insert;
    
        return $this;
    }

    /**
     * Get insert
     *
     * @return datetimeutc 
     */
    public function getInsert()
    {
        return $this->insert;
    }

    /**
     * Set update
     *
     * @param datetimeutc $update
     * @return TitanMedia
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
     * Set user
     *
     * @param \Admin\Model\TitanUser $user
     * @return TitanMedia
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