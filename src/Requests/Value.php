<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Value
 */
class Value
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $id;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @return null|string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param null|string $id
     * @return Value
     */
    public function setId(?string $id): Value
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Value
     */
    public function setName(?string $name): Value
    {
        $this->name = $name;
        return $this;
    }
}