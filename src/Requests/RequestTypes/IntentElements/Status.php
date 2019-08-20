<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements;

use JMS\Serializer\Annotation as JMS;

class Status
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $code;

    /**
     * @return string|null
     */
    public function getCode(): ?string
    {
        return $this->code;
    }
}
