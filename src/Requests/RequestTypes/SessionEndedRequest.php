<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedElements\Error;
use JMS\Serializer\Annotation as JMS;

class SessionEndedRequest extends AbstractRequest
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $reason;

    /**
     * @var Error|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\RequestTypes\SessionEndedElements\Error")
     */
    protected $error;

    /**
     * @return string|null
     */
    public function getReason(): ?string
    {
        return $this->reason;
    }

    /**
     * @return Error|null
     */
    public function getError(): ?Error
    {
        return $this->error;
    }
}
