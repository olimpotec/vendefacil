<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * MarketCompanies
 *
 * @ORM\Table(name="market.companies")
 * @ORM\Entity
 */
class MarketCompanies
{
    /**
     * @var integer
     *
     * @ORM\Column(name="company_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="market.companies_company_id_seq", allocationSize=1, initialValue=1)
     */
    private $companyId;

    /**
     * @var string
     *
     * @ORM\Column(name="company_name", type="string", length=1024, nullable=true)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="cnpj", type="string", length=19, nullable=true)
     */
    private $cnpj;

    /**
     * @var integer
     *
     * @ORM\Column(name="cnae", type="integer", nullable=true)
     */
    private $cnae;

    /**
     * @var string
     *
     * @ORM\Column(name="state_registration", type="string", length=32, nullable=true)
     */
    private $stateRegistration;

    /**
     * @var string
     *
     * @ORM\Column(name="city_registration", type="string", length=32, nullable=true)
     */
    private $cityRegistration;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="founded_at", type="datetimeutc", nullable=true)
     */
    private $foundedAt;

    /**
     * @var \Admin\Model\TitanCity
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanCity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="city", referencedColumnName="_id")
     * })
     */
    private $city;



    /**
     * Get companyId
     *
     * @return integer 
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * Set companyName
     *
     * @param string $companyName
     * @return MarketCompanies
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;
    
        return $this;
    }

    /**
     * Get companyName
     *
     * @return string 
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set cnpj
     *
     * @param string $cnpj
     * @return MarketCompanies
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    
        return $this;
    }

    /**
     * Get cnpj
     *
     * @return string 
     */
    public function getCnpj()
    {
        return $this->cnpj;
    }

    /**
     * Set cnae
     *
     * @param integer $cnae
     * @return MarketCompanies
     */
    public function setCnae($cnae)
    {
        $this->cnae = $cnae;
    
        return $this;
    }

    /**
     * Get cnae
     *
     * @return integer 
     */
    public function getCnae()
    {
        return $this->cnae;
    }

    /**
     * Set stateRegistration
     *
     * @param string $stateRegistration
     * @return MarketCompanies
     */
    public function setStateRegistration($stateRegistration)
    {
        $this->stateRegistration = $stateRegistration;
    
        return $this;
    }

    /**
     * Get stateRegistration
     *
     * @return string 
     */
    public function getStateRegistration()
    {
        return $this->stateRegistration;
    }

    /**
     * Set cityRegistration
     *
     * @param string $cityRegistration
     * @return MarketCompanies
     */
    public function setCityRegistration($cityRegistration)
    {
        $this->cityRegistration = $cityRegistration;
    
        return $this;
    }

    /**
     * Get cityRegistration
     *
     * @return string 
     */
    public function getCityRegistration()
    {
        return $this->cityRegistration;
    }

    /**
     * Set foundedAt
     *
     * @param datetimeutc $foundedAt
     * @return MarketCompanies
     */
    public function setFoundedAt($foundedAt)
    {
        $this->foundedAt = $foundedAt;
    
        return $this;
    }

    /**
     * Get foundedAt
     *
     * @return datetimeutc 
     */
    public function getFoundedAt()
    {
        return $this->foundedAt;
    }

    /**
     * Set city
     *
     * @param \Admin\Model\TitanCity $city
     * @return MarketCompanies
     */
    public function setCity(\Admin\Model\TitanCity $city = null)
    {
        $this->city = $city;
    
        return $this;
    }

    /**
     * Get city
     *
     * @return \Admin\Model\TitanCity 
     */
    public function getCity()
    {
        return $this->city;
    }
}