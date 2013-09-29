<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanUser
 *
 * @ORM\Table(name="titan._user")
 * @ORM\Entity
 */
class TitanUser
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._user__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="_name", type="string", length=256, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="_login", type="string", length=64, nullable=false)
     */
    private $login;

    /**
     * @var string
     *
     * @ORM\Column(name="_password", type="string", length=40, nullable=false)
     */
    private $password;

    /**
     * @var boolean
     *
     * @ORM\Column(name="_active", type="boolean", nullable=false)
     */
    private $active;

    /**
     * @var string
     *
     * @ORM\Column(name="_email", type="string", length=512, nullable=false)
     */
    private $email;

    /**
     * @var boolean
     *
     * @ORM\Column(name="_deleted", type="boolean", nullable=false)
     */
    private $deleted;

    /**
     * @var string
     *
     * @ORM\Column(name="_type", type="string", length=64, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="_language", type="string", nullable=false)
     */
    private $language;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_create_date", type="datetimeutc", nullable=false)
     */
    private $createDate;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_update_date", type="datetimeutc", nullable=false)
     */
    private $updateDate;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_last_logon", type="datetimeutc", nullable=false)
     */
    private $lastLogon;

    /**
     * @var string
     *
     * @ORM\Column(name="street", type="string", length=256, nullable=true)
     */
    private $street;

    /**
     * @var integer
     *
     * @ORM\Column(name="number", type="integer", nullable=true)
     */
    private $number;

    /**
     * @var string
     *
     * @ORM\Column(name="quarter", type="string", length=256, nullable=true)
     */
    private $quarter;

    /**
     * @var string
     *
     * @ORM\Column(name="cep", type="string", nullable=true)
     */
    private $cep;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=64, nullable=true)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="mobile", type="string", length=64, nullable=true)
     */
    private $mobile;

    /**
     * @var string
     *
     * @ORM\Column(name="complement", type="string", length=512, nullable=true)
     */
    private $complement;

    /**
     * @var string
     *
     * @ORM\Column(name="msn", type="string", length=256, nullable=true)
     */
    private $msn;

    /**
     * @var string
     *
     * @ORM\Column(name="skype", type="string", length=256, nullable=true)
     */
    private $skype;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=256, nullable=true)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="orkut", type="string", length=256, nullable=true)
     */
    private $orkut;

    /**
     * @var string
     *
     * @ORM\Column(name="cpf", type="string", length=11, nullable=true)
     */
    private $cpf;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="birthday", type="datetimeutc", nullable=true)
     */
    private $birthday;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", nullable=false)
     */
    private $gender;

    /**
     * @var string
     *
     * @ORM\Column(name="marriage", type="string", nullable=false)
     */
    private $marriage;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Admin\Model\TitanGroup", inversedBy="user")
     * @ORM\JoinTable(name="titan._user_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="_user", referencedColumnName="_id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="_group", referencedColumnName="_id")
     *   }
     * )
     */
    private $group;

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
     * @var \Admin\Model\TitanFile
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanFile")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="photo", referencedColumnName="_id")
     * })
     */
    private $photo;

    /**
     * @var \Admin\Model\TitanState
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanState")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="state", referencedColumnName="_uf")
     * })
     */
    private $state;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * @return TitanUser
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
     * Set login
     *
     * @param string $login
     * @return TitanUser
     */
    public function setLogin($login)
    {
        $this->login = $login;
    
        return $this;
    }

    /**
     * Get login
     *
     * @return string 
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return TitanUser
     */
    public function setPassword($password)
    {
        $this->password = $password;
    
        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return TitanUser
     */
    public function setActive($active)
    {
        $this->active = $active;
    
        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return TitanUser
     */
    public function setEmail($email)
    {
        $this->email = $email;
    
        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set deleted
     *
     * @param boolean $deleted
     * @return TitanUser
     */
    public function setDeleted($deleted)
    {
        $this->deleted = $deleted;
    
        return $this;
    }

    /**
     * Get deleted
     *
     * @return boolean 
     */
    public function getDeleted()
    {
        return $this->deleted;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return TitanUser
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
     * Set language
     *
     * @param string $language
     * @return TitanUser
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set createDate
     *
     * @param datetimeutc $createDate
     * @return TitanUser
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
     * Set updateDate
     *
     * @param datetimeutc $updateDate
     * @return TitanUser
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
     * Set lastLogon
     *
     * @param datetimeutc $lastLogon
     * @return TitanUser
     */
    public function setLastLogon($lastLogon)
    {
        $this->lastLogon = $lastLogon;
    
        return $this;
    }

    /**
     * Get lastLogon
     *
     * @return datetimeutc 
     */
    public function getLastLogon()
    {
        return $this->lastLogon;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return TitanUser
     */
    public function setStreet($street)
    {
        $this->street = $street;
    
        return $this;
    }

    /**
     * Get street
     *
     * @return string 
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set number
     *
     * @param integer $number
     * @return TitanUser
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
     * Set quarter
     *
     * @param string $quarter
     * @return TitanUser
     */
    public function setQuarter($quarter)
    {
        $this->quarter = $quarter;
    
        return $this;
    }

    /**
     * Get quarter
     *
     * @return string 
     */
    public function getQuarter()
    {
        return $this->quarter;
    }

    /**
     * Set cep
     *
     * @param string $cep
     * @return TitanUser
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    
        return $this;
    }

    /**
     * Get cep
     *
     * @return string 
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return TitanUser
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    
        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set mobile
     *
     * @param string $mobile
     * @return TitanUser
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;
    
        return $this;
    }

    /**
     * Get mobile
     *
     * @return string 
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set complement
     *
     * @param string $complement
     * @return TitanUser
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;
    
        return $this;
    }

    /**
     * Get complement
     *
     * @return string 
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * Set msn
     *
     * @param string $msn
     * @return TitanUser
     */
    public function setMsn($msn)
    {
        $this->msn = $msn;
    
        return $this;
    }

    /**
     * Get msn
     *
     * @return string 
     */
    public function getMsn()
    {
        return $this->msn;
    }

    /**
     * Set skype
     *
     * @param string $skype
     * @return TitanUser
     */
    public function setSkype($skype)
    {
        $this->skype = $skype;
    
        return $this;
    }

    /**
     * Get skype
     *
     * @return string 
     */
    public function getSkype()
    {
        return $this->skype;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return TitanUser
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
     * Set orkut
     *
     * @param string $orkut
     * @return TitanUser
     */
    public function setOrkut($orkut)
    {
        $this->orkut = $orkut;
    
        return $this;
    }

    /**
     * Get orkut
     *
     * @return string 
     */
    public function getOrkut()
    {
        return $this->orkut;
    }

    /**
     * Set cpf
     *
     * @param string $cpf
     * @return TitanUser
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    
        return $this;
    }

    /**
     * Get cpf
     *
     * @return string 
     */
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Set birthday
     *
     * @param datetimeutc $birthday
     * @return TitanUser
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    
        return $this;
    }

    /**
     * Get birthday
     *
     * @return datetimeutc 
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Set gender
     *
     * @param string $gender
     * @return TitanUser
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    
        return $this;
    }

    /**
     * Get gender
     *
     * @return string 
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set marriage
     *
     * @param string $marriage
     * @return TitanUser
     */
    public function setMarriage($marriage)
    {
        $this->marriage = $marriage;
    
        return $this;
    }

    /**
     * Get marriage
     *
     * @return string 
     */
    public function getMarriage()
    {
        return $this->marriage;
    }

    /**
     * Add group
     *
     * @param \Admin\Model\TitanGroup $group
     * @return TitanUser
     */
    public function addGroup(\Admin\Model\TitanGroup $group)
    {
        $this->group[] = $group;
    
        return $this;
    }

    /**
     * Remove group
     *
     * @param \Admin\Model\TitanGroup $group
     */
    public function removeGroup(\Admin\Model\TitanGroup $group)
    {
        $this->group->removeElement($group);
    }

    /**
     * Get group
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * Set city
     *
     * @param \Admin\Model\TitanCity $city
     * @return TitanUser
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

    /**
     * Set photo
     *
     * @param \Admin\Model\TitanFile $photo
     * @return TitanUser
     */
    public function setPhoto(\Admin\Model\TitanFile $photo = null)
    {
        $this->photo = $photo;
    
        return $this;
    }

    /**
     * Get photo
     *
     * @return \Admin\Model\TitanFile 
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set state
     *
     * @param \Admin\Model\TitanState $state
     * @return TitanUser
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