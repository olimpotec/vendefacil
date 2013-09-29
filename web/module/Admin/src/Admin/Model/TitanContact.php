<?php

namespace Admin\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * TitanContact
 *
 * @ORM\Table(name="titan._contact")
 * @ORM\Entity
 */
class TitanContact
{
    /**
     * @var integer
     *
     * @ORM\Column(name="_id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="titan._contact__id_seq", allocationSize=1, initialValue=1)
     */
    private $id;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_send_date", type="datetimeutc", nullable=false)
     */
    private $sendDate;

    /**
     * @var datetimeutc
     *
     * @ORM\Column(name="_response_date", type="datetimeutc", nullable=true)
     */
    private $responseDate;

    /**
     * @var boolean
     *
     * @ORM\Column(name="_responsed", type="boolean", nullable=false)
     */
    private $responsed;

    /**
     * @var string
     *
     * @ORM\Column(name="_response", type="text", nullable=true)
     */
    private $response;

    /**
     * @var string
     *
     * @ORM\Column(name="_actor_name", type="string", length=256, nullable=true)
     */
    private $actorName;

    /**
     * @var string
     *
     * @ORM\Column(name="_actor_email", type="string", length=256, nullable=true)
     */
    private $actorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="_actor_subject", type="string", length=256, nullable=true)
     */
    private $actorSubject;

    /**
     * @var string
     *
     * @ORM\Column(name="_actor_message", type="text", nullable=true)
     */
    private $actorMessage;

    /**
     * @var \Admin\Model\TitanUser
     *
     * @ORM\ManyToOne(targetEntity="Admin\Model\TitanUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="_responser", referencedColumnName="_id")
     * })
     */
    private $responser;



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
     * Set sendDate
     *
     * @param datetimeutc $sendDate
     * @return TitanContact
     */
    public function setSendDate($sendDate)
    {
        $this->sendDate = $sendDate;
    
        return $this;
    }

    /**
     * Get sendDate
     *
     * @return datetimeutc 
     */
    public function getSendDate()
    {
        return $this->sendDate;
    }

    /**
     * Set responseDate
     *
     * @param datetimeutc $responseDate
     * @return TitanContact
     */
    public function setResponseDate($responseDate)
    {
        $this->responseDate = $responseDate;
    
        return $this;
    }

    /**
     * Get responseDate
     *
     * @return datetimeutc 
     */
    public function getResponseDate()
    {
        return $this->responseDate;
    }

    /**
     * Set responsed
     *
     * @param boolean $responsed
     * @return TitanContact
     */
    public function setResponsed($responsed)
    {
        $this->responsed = $responsed;
    
        return $this;
    }

    /**
     * Get responsed
     *
     * @return boolean 
     */
    public function getResponsed()
    {
        return $this->responsed;
    }

    /**
     * Set response
     *
     * @param string $response
     * @return TitanContact
     */
    public function setResponse($response)
    {
        $this->response = $response;
    
        return $this;
    }

    /**
     * Get response
     *
     * @return string 
     */
    public function getResponse()
    {
        return $this->response;
    }

    /**
     * Set actorName
     *
     * @param string $actorName
     * @return TitanContact
     */
    public function setActorName($actorName)
    {
        $this->actorName = $actorName;
    
        return $this;
    }

    /**
     * Get actorName
     *
     * @return string 
     */
    public function getActorName()
    {
        return $this->actorName;
    }

    /**
     * Set actorEmail
     *
     * @param string $actorEmail
     * @return TitanContact
     */
    public function setActorEmail($actorEmail)
    {
        $this->actorEmail = $actorEmail;
    
        return $this;
    }

    /**
     * Get actorEmail
     *
     * @return string 
     */
    public function getActorEmail()
    {
        return $this->actorEmail;
    }

    /**
     * Set actorSubject
     *
     * @param string $actorSubject
     * @return TitanContact
     */
    public function setActorSubject($actorSubject)
    {
        $this->actorSubject = $actorSubject;
    
        return $this;
    }

    /**
     * Get actorSubject
     *
     * @return string 
     */
    public function getActorSubject()
    {
        return $this->actorSubject;
    }

    /**
     * Set actorMessage
     *
     * @param string $actorMessage
     * @return TitanContact
     */
    public function setActorMessage($actorMessage)
    {
        $this->actorMessage = $actorMessage;
    
        return $this;
    }

    /**
     * Get actorMessage
     *
     * @return string 
     */
    public function getActorMessage()
    {
        return $this->actorMessage;
    }

    /**
     * Set responser
     *
     * @param \Admin\Model\TitanUser $responser
     * @return TitanContact
     */
    public function setResponser(\Admin\Model\TitanUser $responser = null)
    {
        $this->responser = $responser;
    
        return $this;
    }

    /**
     * Get responser
     *
     * @return \Admin\Model\TitanUser 
     */
    public function getResponser()
    {
        return $this->responser;
    }
}