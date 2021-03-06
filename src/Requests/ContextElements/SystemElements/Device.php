<?php

namespace DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements;

use JMS\Serializer\Annotation as JMS;

class Device
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("deviceId")
     */
    private $deviceId;

    /**
     * @var array[]|null
     * @JMS\Type("array<string, array>")
     * @JMS\SerializedName("supportedInterfaces")
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
     * @return array
     */
    public function getSupportedInterfaces(): array
    {
        return $this->supportedInterfaces ?? [];
    }

    /**
     * @param string $interfaceKey
     *
     * @return bool
     */
    public function doesSupportInterface(string $interfaceKey): bool
    {
        return isset($this->supportedInterfaces[$interfaceKey]);
    }

    /**
     * @param string $interfaceKey
     *
     * @return array|null
     */
    public function getSupportedInterfaceByKey(string $interfaceKey): ?array
    {
        return $this->supportedInterfaces[$interfaceKey] ?? null;
    }
}
