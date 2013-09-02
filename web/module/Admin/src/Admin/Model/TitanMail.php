<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanMail
 *
 * @ORM\Table(name="titan._mail")
 * @ORM\Entity
 */
class TitanMail
{
    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=256, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $name;

    /**
     * @var \Admin\Model\TitanGroup
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Admin\Model\TitanGroup")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="_group", referencedColumnName="_id")
     * })
     */
    private $group;



    /**
     * Set name
     *
     * @param string $name
     * @return TitanMail
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
     * Set group
     *
     * @param \Admin\Model\TitanGroup $group
     * @return TitanMail
     */
    public function setGroup(\Admin\Model\TitanGroup $group)
    {
        $this->group = $group;
    
        return $this;
    }

    /**
     * Get group
     *
     * @return \Admin\Model\TitanGroup 
     */
    public function getGroup()
    {
        return $this->group;
    }
}