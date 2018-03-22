<?php

namespace DaDaDev\AmazonAlexa\Responses;

use JMS\Serializer\Annotation as JMS;

/**
 * Class OutputSpeech
 */
class OutputSpeech
{
    public const TYPE_PLAINTEXT = 'PlainText';
    public const TYPE_SSML = 'SSML';

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    private $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    private $text;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    private $ssml;

    /**
     * @return null|string
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param null|string $type
     * @return OutputSpeech
     */
    public function setType(?string $type): OutputSpeech
    {
        $this->type = $type;
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
     * @return OutputSpeech
     */
    public function setText(?string $text): OutputSpeech
    {
        $this->text = $text;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getSsml(): ?string
    {
        return $this->ssml;
    }

    /**
     * @param null|string $ssml
     * @return OutputSpeech
     */
    public function setSsml(?string $ssml): OutputSpeech
    {
        $this->ssml = $ssml;
        return $this;
    }
}