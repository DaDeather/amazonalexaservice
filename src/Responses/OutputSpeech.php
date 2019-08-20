<?php

namespace DaDaDev\AmazonAlexa\Responses;

use JMS\Serializer\Annotation as JMS;

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
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return OutputSpeech
     */
    public function setType(?string $type): OutputSpeech
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return OutputSpeech
     */
    public function setText(?string $text): OutputSpeech
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSsml(): ?string
    {
        return $this->ssml;
    }

    /**
     * @param string|null $ssml
     *
     * @return OutputSpeech
     */
    public function setSsml(?string $ssml): OutputSpeech
    {
        $this->ssml = $ssml;

        return $this;
    }
}
