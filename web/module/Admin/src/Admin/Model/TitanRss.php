<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanRss
 *
 * @ORM\Table(name="titan._rss")
 * @ORM\Entity
 */
class TitanRss
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._rss__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_url", type="string", length=512, nullable=false)
     */
    private $url;

    /**
     * @var integer
     *
     * @ORM\Column(name="_column_index", type="integer", nullable=false)
     */
    private $columnIndex;

    /**
     * @var integer
     *
     * @ORM\Column(name="_height", type="integer", nullable=false)
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="_number", type="integer", nullable=false)
     */
    private $number;

    /**
     * @var integer
     *
     * @ORM\Column(name="_minutes", type="integer", nullable=false)
     */
    private $minutes;

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
     * Set url
     *
     * @param string $url
     * @return TitanRss
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set columnIndex
     *
     * @param integer $columnIndex
     * @return TitanRss
     */
    public function setColumnIndex($columnIndex)
    {
        $this->columnIndex = $columnIndex;
    
        return $this;
    }

    /**
     * Get columnIndex
     *
     * @return integer 
     */
    public function getColumnIndex()
    {
        return $this->columnIndex;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return TitanRss
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return TitanRss
     */
    public function setNumber($number)
    {
        $this->number = $number;
    
        return $this;
    }

    /**
     * Get number
     *
     * @return integer 
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set minutes
     *
     * @param integer $minutes
     * @return TitanRss
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
    
        return $this;
    }

    /**
     * Get minutes
     *
     * @return integer 
     */
    public function getMinutes()
    {
        return $this->minutes;
    }

    /**
     * Set user
     *
     * @param \Admin\Model\TitanUser $user
     * @return TitanRss
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