<?php

namespace Core\Entity;

use Core\Entity\Traits\EntityTrait;
use DateInterval;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Core\Repository\SessionRepository")
 * @ORM\Table(name="core_session")
 */
class Session
{
    /**
     * Clé unique de session
     * @ORM\Id()
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $session_key;

    /**
     * Message
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $session_content;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $session_expiration;

    /**
     * Date de création
     *
     * @ORM\Column(type="datetime")
     */
    protected $created_at;

    /**
     * Date de mise à jours
     *
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $user_ip;


    /**
     * Constructeur
     * @throws \Exception
     */
    public function __construct()
    {
        $datetime = new \Datetime();
        $this->setCreatedAt($datetime);
        $this->setUpdatedAt($datetime);
    }

    /**
     * @return mixed
     */
    public function getSessionKey()
    {
        return $this->session_key;
    }

    /**
     * @param mixed $session_key
     */
    public function setSessionKey($session_key)
    {
        $this->session_key = $session_key;
    }

    /**
     * @return mixed
     */
    public function getSessionContent()
    {
        return $this->session_content;
    }

    /**
     * @param mixed $session_content
     */
    public function setSessionContent($session_content)
    {
        $this->session_content = $session_content;
    }

    /**
     * @return mixed
     */
    public function getUserIp()
    {
        return $this->user_ip;
    }

    /**
     * @param mixed $user_ip
     */
    public function setUserIp($user_ip)
    {
        $this->user_ip = $user_ip;
    }

    /**
     * @return mixed
     */
    public function getSessionExpiration()
    {
        return $this->session_expiration;
    }

    /**
     * @param mixed $session_expiration
     */
    public function setSessionExpiration($seconds_to_add)
    {
        $this->session_expiration = new DateTime('NOW');
        $this->session_expiration = $this->session_expiration->add(new DateInterval('PT' . $seconds_to_add . 'S'));
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
    }

}
