<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Error
 */
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
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     * @return Error
     */
    public function setType(?string $type): Error
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    /**
     * @param null|string $message
     * @return Error
     */
    public function setMessage(?string $message): Error
    {
        $this->message = $message;
        return $this;
    }
}