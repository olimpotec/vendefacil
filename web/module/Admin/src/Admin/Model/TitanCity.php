<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanCity
 *
 * @ORM\Table(name="titan._city")
 * @ORM\Entity
 */
class TitanCity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="smallint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._city__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var \Admin\Model\TitanState
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="_state", referencedColumnName="_uf")
     * })
     */
    private $state;



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
     * @return TitanCity
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
     * Set state
     *
     * @param \Admin\Model\TitanState $state
     * @return TitanCity
     */
    public function setState(\Admin\Model\TitanState $state = null)
    {
        $this->state = $state;
    
        return $this;
    }

    /**
     * Get state
     *
     * @return \Admin\Model\TitanState 
     */
    public function getState()
    {
        return $this->state;
    }
}