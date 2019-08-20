<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

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
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }
}
