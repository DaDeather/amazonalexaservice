<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class Application
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("applicationId")
     */
    protected $applicationId;

    /**
     * @return string|null
     */
    public function getApplicationId(): ?string
    {
        return $this->applicationId;
    }
}
