<?php

namespace DaDaDev\AmazonAlexa\Requests;

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
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Error")
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
