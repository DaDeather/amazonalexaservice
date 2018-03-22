<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Resolution
 */
class Resolution
{
    /**
     * @var array|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Requests\ResolutionPerAuthority>")
     * @JMS\SerializedName("resolutionPerAuthority")
     */
    protected $resolutionsPerAuthority;

    /**
     * @return array|null
     */
    public function getResolutionsPerAuthority(): ?array
    {
        return $this->resolutionsPerAuthority;
    }

    /**
     * @param array|null $resolutionsPerAuthority
     * @return Resolution
     */
    public function setResolutionsPerAuthority(?array $resolutionsPerAuthority): Resolution
    {
        $this->resolutionsPerAuthority = $resolutionsPerAuthority;
        return $this;
    }
}