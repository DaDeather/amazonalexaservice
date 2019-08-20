<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(
 *     field="type",
 *     disabled=false,
 *     map={
 *          "LaunchRequest": "DaDaDev\AmazonAlexa\Requests\LaunchRequest",
 *          "IntentRequest": "DaDaDev\AmazonAlexa\Requests\IntentRequest",
 *          "SessionEndedRequest": "DaDaDev\AmazonAlexa\Requests\SessionEndedRequest",
 *          "Alexa.Presentation.APL.UserEvent": "DaDaDev\AmazonAlexa\Requests\AplUserEventRequest",
 *     }
 * )
 */
abstract class AbstractRequest
{
    public const TYPE_LAUNCH_REQUEST = 'LaunchRequest';
    public const TYPE_INTENT_REQUEST = 'IntentRequest';
    public const TYPE_SESSION_ENDED_REQUEST = 'SessionEndedRequest';
    public const TYPE_APL_USER_EVENT_REQUEST = 'Alexa.Presentation.APL.UserEvent';

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
    protected $timestamp;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $locale;

    /**
     * @return string
     */
    public function getType(): string
    {
        switch (get_class($this)) {
            case LaunchRequest::class:
                return self::TYPE_LAUNCH_REQUEST;
            case IntentRequest::class:
                return self::TYPE_INTENT_REQUEST;
            case SessionEndedRequest::class:
                return self::TYPE_SESSION_ENDED_REQUEST;
            case AplUserEventRequest::class:
                return self::TYPE_APL_USER_EVENT_REQUEST;
            default:
                throw new \RuntimeException(
                    'The type does not correspond to the defined discrimination!',
                    1566285605173
                );
        }
    }

    /**
     * @return string|null
     */
    public function getRequestId(): ?string
    {
        return $this->requestId;
    }

    /**
     * @return \DateTime|null
     */
    public function getTimestamp(): ?\DateTime
    {
        return $this->timestamp;
    }

    /**
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return $this->locale;
    }
}
