<?php

namespace DaDaDev\AmazonAlexa\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Card
 */
class Card
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $title;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $content;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $text;

    /**
     * @var Image|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Image")
     */
    protected $image;

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     * @return Card
     */
    public function setType(?string $type): Card
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     * @return Card
     */
    public function setTitle(?string $title): Card
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getContent(): ?string
    {
        return $this->content;
    }

    /**
     * @param null|string $content
     * @return Card
     */
    public function setContent(?string $content): Card
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param null|string $text
     * @return Card
     */
    public function setText(?string $text): Card
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return Image|null
     */
    public function getImage(): ?Image
    {
        return $this->image;
    }

    /**
     * @param Image|null $image
     * @return Card
     */
    public function setImage(?Image $image): Card
    {
        $this->image = $image;
        return $this;
    }
}