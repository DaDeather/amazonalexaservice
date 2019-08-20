<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class User
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("userId")
     */
    protected $userId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("accessToken")
     */
    protected $accessToken;

    /**
     * @return string|null
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }
}
