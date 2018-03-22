<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Application
 */
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

    /**
     * @param null|string $applicationId
     * @return Application
     */
    public function setApplicationId(?string $applicationId): Application
    {
        $this->applicationId = $applicationId;
        return $this;
    }
}