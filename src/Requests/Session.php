<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Session
 */
class Session
{
    /**
     * @var boolean|null
     * @JMS\Type("boolean")
     */
    protected $new = false;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("sessionId")
     */
    protected $sessionId;

    /**
     * @var Application|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Application")
     */
    protected $application;

    /**
     * @var array|null
     * @JMS\Type("array<string, string>")
     */
    protected $attributes;

    /**
     * @var User|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\User")
     */
    protected $user;

    /**
     * @return bool
     */
    public function isNew(): bool
    {
        return $this->new;
    }

    /**
     * @param bool $new
     * @return Session
     */
    public function setNew(?bool $new): Session
    {
        $this->new = $new;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    /**
     * @param string|null $sessionId
     * @return Session
     */
    public function setSessionId(?string $sessionId): Session
    {
        $this->sessionId = $sessionId;
        return $this;
    }

    /**
     * @return Application|null
     */
    public function getApplication(): ?Application
    {
        return $this->application;
    }

    /**
     * @param Application|null $application
     * @return Session
     */
    public function setApplication(?Application $application): Session
    {
        $this->application = $application;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @param array|null $attributes
     * @return Session
     */
    public function setAttributes(?array $attributes): Session
    {
        $this->attributes = $attributes;
        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return Session
     */
    public function setUser(?User $user): Session
    {
        $this->user = $user;
        return $this;
    }
}