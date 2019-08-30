<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements;

use JMS\Serializer\Annotation as JMS;

class ResolutionPerAuthority
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $authority;

    /**
     * @var Status
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Status")
     */
    protected $status;

    /**
     * @var Values[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Values>")
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
     * @return Status
     */
    public function getStatus(): Status
    {
        return $this->status ?? new NullStatus();
    }

    /**
     * @return Values[]
     */
    public function getValues(): array
    {
        return $this->values ?? [];
    }
}
