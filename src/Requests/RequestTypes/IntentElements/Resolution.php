<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements;

use JMS\Serializer\Annotation as JMS;

class Resolution
{
    /**
     * @var ResolutionPerAuthority[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\ResolutionPerAuthority>")
     * @JMS\SerializedName("resolutionsPerAuthority")
     */
    protected $resolutionsPerAuthority;

    /**
     * @return array
     */
    public function getResolutionsPerAuthority(): array
    {
        return $this->resolutionsPerAuthority ?? [];
    }
}
