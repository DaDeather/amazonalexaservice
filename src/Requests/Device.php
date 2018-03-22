<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Device
 */
class Device
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("deviceId")
     */
    private $deviceId;

    /**
     * @var string[]|null
     * @JMS\Type("array<string, string>")
     */
    private $supportedInterfaces;

    /**
     * @return string|null
     */
    public function getDeviceId(): ?string
    {
        return $this->deviceId;
    }

    /**
     * @param string|null $deviceId
     * @return Device
     */
    public function setDeviceId(?string $deviceId): Device
    {
        $this->deviceId = $deviceId;
        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getSupportedInterfaces(): ?array
    {
        return $this->supportedInterfaces;
    }

    /**
     * @param string[]|null $supportedInterfaces
     * @return Device
     */
    public function setSupportedInterfaces(?array $supportedInterfaces): Device
    {
        $this->supportedInterfaces = $supportedInterfaces;
        return $this;
    }
}