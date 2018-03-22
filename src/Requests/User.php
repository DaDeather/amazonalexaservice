<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class User
 */
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
     * @return null|string
     */
    public function getUserId(): ?string
    {
        return $this->userId;
    }

    /**
     * @param null|string $userId
     * @return User
     */
    public function setUserId(?string $userId): User
    {
        $this->userId = $userId;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param null|string $accessToken
     * @return User
     */
    public function setAccessToken(?string $accessToken): User
    {
        $this->accessToken = $accessToken;
        return $this;
    }
}