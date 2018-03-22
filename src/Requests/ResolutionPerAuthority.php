<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class ResolutionPerAuthority
 */
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
     * @return null|string
     */
    public function getAuthority(): ?string
    {
        return $this->authority;
    }

    /**
     * @param null|string $authority
     * @return ResolutionPerAuthority
     */
    public function setAuthority(?string $authority): ResolutionPerAuthority
    {
        $this->authority = $authority;
        return $this;
    }

    /**
     * @return Status|null
     */
    public function getStatus(): ?Status
    {
        return $this->status;
    }

    /**
     * @param Status|null $status
     * @return ResolutionPerAuthority
     */
    public function setStatus(?Status $status): ResolutionPerAuthority
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return Values[]|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param Values[]|null $values
     * @return ResolutionPerAuthority
     */
    public function setValues(?array $values): ResolutionPerAuthority
    {
        $this->values = $values;
        return $this;
    }
}