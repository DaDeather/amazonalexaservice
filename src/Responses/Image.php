<?php

namespace DaDaDev\AmazonAlexa\Responses;

use JMS\Serializer\Annotation as JMS;

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
     * @return string|null
     */
    public function getSmallImageUrl(): ?string
    {
        return $this->smallImageUrl;
    }

    /**
     * @param string|null $smallImageUrl
     *
     * @return Image
     */
    public function setSmallImageUrl(?string $smallImageUrl): Image
    {
        $this->smallImageUrl = $smallImageUrl;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLargeImageUrl(): ?string
    {
        return $this->largeImageUrl;
    }

    /**
     * @param string|null $largeImageUrl
     *
     * @return Image
     */
    public function setLargeImageUrl(?string $largeImageUrl): Image
    {
        $this->largeImageUrl = $largeImageUrl;

        return $this;
    }
}
