<?php

namespace DaDaDev\AmazonAlexa\Requests;

use DaDaDev\AmazonAlexa\Requests\RequestTypes\AplUserEventRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\LaunchRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedRequest;
use JMS\Serializer\Annotation as JMS;

/**
 * @JMS\Discriminator(
 *     field="type",
 *     disabled=false,
 *     map={
 *          "LaunchRequest": "DaDaDev\AmazonAlexa\Requests\RequestTypes\LaunchRequest",
 *          "IntentRequest": "DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentRequest",
 *          "SessionEndedRequest": "DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedRequest",
 *          "Alexa.Presentation.APL.UserEvent": "DaDaDev\AmazonAlexa\Requests\RequestTypes\AplUserEventRequest",
 *     }
 * )
 */
abstract class AbstractRequest
{
    private const LOCALE_GERMAN_GERMAN = 'de-DE';
    private const LOCALE_AUSTRALIAN_ENGLISH = 'en-AU';
    private const LOCALE_CANADIAN_ENGLISH = 'en-CA';
    private const LOCALE_BRITISH_ENGLISH = 'en-GB';
    private const LOCALE_INDIAN_ENGLISH = 'en-IN';
    private const LOCALE_AMERICAN_ENGLISH = 'en-US';
    private const LOCALE_SPANISH_SPANISH = 'es-ES';
    private const LOCALE_MEXICAN_SPANISH = 'es-MX';
    private const LOCALE_AMERICAN_SPANISH = 'es-US';
    private const LOCALE_CANADIAN_FRENCH = 'fr-CA';
    private const LOCALE_FRENCH_FRENCH = 'fr-FR';
    private const LOCALE_INDIAN_HINDI = 'hi-IN';
    private const LOCALE_ITALIAN_ITALIAN = 'it-IT';
    private const LOCALE_JAPANESE_JAPANESE = 'ja-JP';
    private const LOCALE_BRAZILIAN_PORTUGUESE = 'pt-BR';

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
