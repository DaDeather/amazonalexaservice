<?php

namespace DaDaDev\AmazonAlexa\Requests\ContextElements;

use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Application;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Device;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullApplication;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullDevice;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullUser;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\User;
use JMS\Serializer\Annotation as JMS;

class System
{
    /**
     * @var Device
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Device")
     */
    private $device;

    /**
     * @var Application
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Application")
     */
    private $application;

    /**
     * @var User
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\User")
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
     * @return Device
     */
    public function getDevice(): Device
    {
        return $this->device ?? new NullDevice();
    }

    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return $this->application ?? new NullApplication();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user ?? new NullUser();
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
