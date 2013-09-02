<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanState
 *
 * @ORM\Table(name="titan._state")
 * @ORM\Entity
 */
class TitanState
{
    /**
     * @var string
     *
     * @ORM\Column(name="_uf", type="string", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._state__uf_seq", allocationSize=1, initialValue=1)
     */
    private $uf;

    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=64, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="_region", type="string", length=32, nullable=false)
     */
    private $region;



    /**
     * Get uf
     *
     * @return string 
     */
    public function getUf()
    {
        return $this->uf;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return TitanState
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
     * Set region
     *
     * @param string $region
     * @return TitanState
     */
    public function setRegion($region)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return string 
     */
    public function getRegion()
    {
        return $this->region;
    }
}