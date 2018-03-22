<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Status
 */
class Status
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $code;

    /**
     * @return null|string
     */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     * @return Status
     */
    public function setCode(?string $code): Status
    {
        $this->code = $code;
        return $this;
    }
}