<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements;

use JMS\Serializer\Annotation as JMS;

class Values
{
    /**
     * @var Value[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Value>")
     */
    protected $value;

    /**
     * @return Value[]|null
     */
    public function getValue(): ?array
    {
        return $this->value;
    }
}
