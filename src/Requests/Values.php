<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class Values
{
    /**
     * @var Value[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Requests\Value>")
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
