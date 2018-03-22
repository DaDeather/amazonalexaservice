<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class SessionEndedRequest
 */
class SessionEndedRequest extends IntentRequest
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $reason;

    /**
     * @var Error|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Error")
     */
    protected $error;

    /**
     * @return null|string
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @param null|string $reason
     * @return SessionEndedRequest
     */
    public function setReason(?string $reason): SessionEndedRequest
    {
        $this->reason = $reason;
        return $this;
    }

    /**
     * @return Error|null
     */
    public function getError(): ?Error
    {
        return $this->error;
    }

    /**
     * @param Error|null $error
     * @return SessionEndedRequest
     */
    public function setError(?Error $error): SessionEndedRequest
    {
        $this->error = $error;
        return $this;
    }
}