<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class LaunchRequest
 */
class LaunchRequest
{
    public const TYPE_LAUNCH_REQUEST = 'LaunchRequest';
    public const TYPE_INTENT_REQUEST = 'IntentRequest';
    public const TYPE_SESSION_ENDED_REQUEST = 'SessionEndedRequest';

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("requestId")
     */
    protected $requestId;

    /**
     * @var \DateTime|null
     * @JMS\Type("DateTime")
     */
    protected $timestamp = null;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $locale;

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     * @return LaunchRequest
     */
    public function setType(?string $type): LaunchRequest
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @param null|string $requestId
     * @return LaunchRequest
     */
    public function setRequestId(?string $requestId): LaunchRequest
    {
        $this->requestId = $requestId;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestamp(): ?\DateTime
    {
        return $this->timestamp;
    }

    /**
     * @param \DateTime|null $timestamp
     * @return LaunchRequest
     */
    public function setTimestamp(?\DateTime $timestamp): LaunchRequest
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }

    /**
     * @param null|string $locale
     * @return LaunchRequest
     */
    public function setLocale(?string $locale): LaunchRequest
    {
        $this->locale = $locale;
        return $this;
    }
}