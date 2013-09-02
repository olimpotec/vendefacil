<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanTypeGroup
 *
 * @ORM\Table(name="titan._type_group")
 * @ORM\Entity
 */
class TitanTypeGroup
{
    /**
     * @var string
     *
     * @ORM\Column(name="_type", type="string", length=64, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $type;

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
     * Set type
     *
     * @param string $type
     * @return TitanTypeGroup
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set group
     *
     * @param \Admin\Model\TitanGroup $group
     * @return TitanTypeGroup
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