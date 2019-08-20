<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class System
{
    /**
     * @var Device|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Device")
     */
    private $device;

    /**
     * @var Application|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Application")
     */
    private $application;

    /**
     * @var User|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\User")
     */
    private $user;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("apiEndpoint")
     */
    private $apiEndpoint;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("apiAccessToken")
     */
    private $apiAccessToken;

    /**
     * @return Device|null
     */
    public function getDevice(): ?Device
    {
        return $this->device;
    }

    /**
     * @return Application|null
     */
    public function getApplication(): ?Application
    {
        return $this->application;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @return string|null
     */
    public function getApiEndpoint(): ?string
    {
        return $this->apiEndpoint;
    }

    /**
     * @return string|null
     */
    public function getApiAccessToken(): ?string
    {
        return $this->apiAccessToken;
    }
}
