<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\AplUserEventElements;

use JMS\Serializer\Annotation as JMS;

class EventSource
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("handler")
     */
    protected $handler;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    protected $id;

    /**
     * @var bool|null
     * @JMS\Type("bool")
     * @JMS\SerializedName("value")
     */
    protected $value;

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
    public function getHandler(): ?string
    {
        return $this->handler;
    }

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return bool|null
     */
    public function getValue(): ?bool
    {
        return $this->value;
    }
}
