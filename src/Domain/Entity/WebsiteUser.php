<?php

namespace Smichaelsen\SaladBowlUsers\Domain\Entity;

abstract class WebsiteUser
{

    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $activationToken = '';

    /**
     * @Column(type="string", unique=true)
     * @var string
     */
    protected $email;

    /**
     * @Column(type="string", unique=true)
     * @var string
     */
    protected $name;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     */
    public function createActivationToken()
    {
        $this->activationToken = bin2hex(openssl_random_pseudo_bytes(32));
    }

    /**
     * @return string
     */
    public function getActivationToken()
    {
        return $this->activationToken;
    }

    /**
     *
     */
    public function unsetActivationToken()
    {
        $this->activationToken = '';
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}
