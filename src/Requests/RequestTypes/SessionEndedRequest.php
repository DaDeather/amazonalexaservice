<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedElements\Error;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedElements\NullError;
use JMS\Serializer\Annotation as JMS;

class SessionEndedRequest extends AbstractRequest
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $reason;

    /**
     * @var Error
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedElements\Error")
     */
    protected $error;

    /**
     * @return string
     */
    public function getType(): string
    {
        return self::TYPE_SESSION_ENDED_REQUEST;
    }

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @return Error
     */
    public function getError(): Error
    {
        return $this->error ?? new NullError();
    }
}
