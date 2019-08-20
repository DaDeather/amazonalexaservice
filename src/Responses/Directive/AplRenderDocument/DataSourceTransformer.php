<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument;

use JMS\Serializer\Annotation as JMS;

class DataSourceTransformer
{
    public const TRANSFORMER_SSML_TO_SPEECH = 'ssmlToSpeech';
    public const TRANSFORMER_SSML_TO_TEXT = 'ssmlToText';
    public const TRANSFORMER_TEXT_TO_HINT = 'textToHint';
    public const TRANSFORMER_TEXT_TO_SPEECH = 'textToSpeech';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("inputPath")
     */
    protected $inputPath;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("outputName")
     */
    protected $outputName;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("transformer")
     */
    protected $transformer;

    /**
     * @return string|null
     */
    public function getInputPath(): ?string
    {
        return $this->inputPath;
    }

    /**
     * @param string|null $inputPath
     *
     * @return $this
     */
    public function setInputPath(?string $inputPath): self
    {
        $this->inputPath = $inputPath;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOutputName(): ?string
    {
        return $this->outputName;
    }

    /**
     * @param string|null $outputName
     *
     * @return $this
     */
    public function setOutputName(?string $outputName): self
    {
        $this->outputName = $outputName;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransformer(): ?string
    {
        return $this->transformer;
    }

    /**
     * @param string|null $transformer
     *
     * @return $this
     */
    public function setTransformer(?string $transformer): self
    {
        $this->transformer = $transformer;

        return $this;
    }
}
