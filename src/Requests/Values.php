<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Values
 */
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

    /**
     * @param Value[]|null $value
     * @return Values
     */
    public function setValue(?array $value): Values
    {
        $this->value = $value;
        return $this;
    }
}