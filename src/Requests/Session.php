<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class Session
{
    /**
     * @var bool|null
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
     * @return string|null
     */
    public function getSessionId(): ?string
    {
        return $this->sessionId;
    }

    /**
     * @return Application|null
     */
    public function getApplication(): ?Application
    {
        return $this->application;
    }

    /**
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }
}
