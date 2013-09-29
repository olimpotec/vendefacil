<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanSimple
 *
 * @ORM\Table(name="titan._simple")
 * @ORM\Entity
 */
class TitanSimple
{
    /**
     * @var string
     *
     * @ORM\Column(name="_id", type="string", length=64, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._simple__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_content", type="text", nullable=true)
     */
    private $content;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_update_date", type="datetimeutc", nullable=false)
     */
    private $updateDate;

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
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return TitanSimple
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set updateDate
     *
     * @param datetimeutc $updateDate
     * @return TitanSimple
     */
    public function setUpdateDate($updateDate)
    {
        $this->updateDate = $updateDate;
    
        return $this;
    }

    /**
     * Get updateDate
     *
     * @return datetimeutc 
     */
    public function getUpdateDate()
    {
        return $this->updateDate;
    }

    /**
     * Set user
     *
     * @param \Admin\Model\TitanUser $user
     * @return TitanSimple
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