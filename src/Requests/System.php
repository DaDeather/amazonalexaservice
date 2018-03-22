<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class System
 */
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
     * @param Device|null $device
     * @return System
     */
    public function setDevice(?Device $device): System
    {
        $this->device = $device;
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
     * @return System
     */
    public function setApplication(?Application $application): System
    {
        $this->application = $application;
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
     * @return System
     */
    public function setUser(?User $user): System
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiEndpoint(): ?string
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string|null $apiEndpoint
     * @return System
     */
    public function setApiEndpoint(?string $apiEndpoint): System
    {
        $this->apiEndpoint = $apiEndpoint;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getApiAccessToken(): ?string
    {
        return $this->apiAccessToken;
    }

    /**
     * @param string|null $apiAccessToken
     * @return System
     */
    public function setApiAccessToken(?string $apiAccessToken): System
    {
        $this->apiAccessToken = $apiAccessToken;
        return $this;
    }
}