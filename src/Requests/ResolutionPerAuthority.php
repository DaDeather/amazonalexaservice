<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class ResolutionPerAuthority
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $authority;

    /**
     * @var Status|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Status")
     */
    protected $status;

    /**
     * @var Values[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Requests\Values>")
     */
    protected $values;

    /**
     * @return string|null
     */
    public function getAuthority(): ?string
    {
        return $this->authority;
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @return Values[]|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }
}
