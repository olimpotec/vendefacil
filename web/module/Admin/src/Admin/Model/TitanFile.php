<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanFile
 *
 * @ORM\Table(name="titan._file")
 * @ORM\Entity
 */
class TitanFile
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._file__id_seq", allocationSize=1, initialValue=1)
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
     * @ORM\Column(name="_mimetype", type="string", length=256, nullable=false)
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
     * @ORM\Column(name="_create_date", type="datetimeutc", nullable=false)
     */
    private $createDate;

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
     * @return TitanFile
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
     * @return TitanFile
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
     * @return TitanFile
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
     * @return TitanFile
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
     * Set createDate
     *
     * @param datetimeutc $createDate
     * @return TitanFile
     */
    public function setCreateDate($createDate)
    {
        $this->createDate = $createDate;
    
        return $this;
    }

    /**
     * Get createDate
     *
     * @return datetimeutc 
     */
    public function getCreateDate()
    {
        return $this->createDate;
    }

    /**
     * Set user
     *
     * @param \Admin\Model\TitanUser $user
     * @return TitanFile
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