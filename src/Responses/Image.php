<?php

namespace DaDaDev\AmazonAlexa\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Image
 */
class Image
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("smallImageUrl")
     */
    protected $smallImageUrl;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("largeImageUrl")
     */
    protected $largeImageUrl;

    /**
     * @return null|string
     */
    public function getSmallImageUrl(): ?string
    {
        return $this->smallImageUrl;
    }

    /**
     * @param null|string $smallImageUrl
     * @return Image
     */
    public function setSmallImageUrl(?string $smallImageUrl): Image
    {
        $this->smallImageUrl = $smallImageUrl;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getLargeImageUrl(): ?string
    {
        return $this->largeImageUrl;
    }

    /**
     * @param null|string $largeImageUrl
     * @return Image
     */
    public function setLargeImageUrl(?string $largeImageUrl): Image
    {
        $this->largeImageUrl = $largeImageUrl;
        return $this;
    }
}