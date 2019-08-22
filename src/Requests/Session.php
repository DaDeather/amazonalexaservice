<?php

namespace DaDaDev\AmazonAlexa\Requests;

use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Application;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullApplication;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullUser;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\User;
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
     * @var Application
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Application")
     */
    protected $application;

    /**
     * @var array|null
     * @JMS\Type("array<string, string>")
     */
    protected $attributes;

    /**
     * @var User
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\User")
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
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application ?? new NullApplication();
    }

    /**
     * @return array|null
     */
    public function getAttributes(): ?array
    {
        return $this->attributes;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user ?? new NullUser();
    }
}
