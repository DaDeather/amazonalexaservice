<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class Error
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $message;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }
}
