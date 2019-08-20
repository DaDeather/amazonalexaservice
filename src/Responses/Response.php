<?php

namespace DaDaDev\AmazonAlexa\Responses;

use DaDaDev\AmazonAlexa\Responses\Directive\AbstractDirective;
use JMS\Serializer\Annotation as JMS;

class Response
{
    public const DIRECTIVE_DIALOG_DELEGATE = 'Dialog.Delegate';

    /**
     * @var OutputSpeech|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\OutputSpeech")
     * @JMS\SerializedName("outputSpeech")
     */
    protected $outputSpeech;

    /**
     * @var Card|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Card")
     */
    protected $card;

    /**
     * @var Repromt|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Repromt")
     */
    protected $repromt;

    /**
     * @var AbstractDirective[]|null
     * @JMS\Type("array<App\Utils\AmazonAlexa\Responses\Directive\AbstractDirective>")
     * @JMS\SerializedName("directives")
     */
    protected $directives;

    /**
     * @var bool|null
     * @JMS\Type("boolean")
     * @JMS\SerializedName("shouldEndSession")
     */
    protected $shouldEndSession;

    /**
     * @return OutputSpeech|null
     */
    public function getOutputSpeech(): ?OutputSpeech
    {
        return $this->outputSpeech;
    }

    /**
     * @param OutputSpeech|null $outputSpeech
     *
     * @return Response
     */
    public function setOutputSpeech(?OutputSpeech $outputSpeech): Response
    {
        $this->outputSpeech = $outputSpeech;

        return $this;
    }

    /**
     * @return Card|null
     */
    public function getCard(): ?Card
    {
        return $this->card;
    }

    /**
     * @param Card|null $card
     *
     * @return Response
     */
    public function setCard(?Card $card): Response
    {
        $this->card = $card;

        return $this;
    }

    /**
     * @return Repromt|null
     */
    public function getRepromt(): ?Repromt
    {
        return $this->repromt;
    }

    /**
     * @param Repromt|null $repromt
     *
     * @return Response
     */
    public function setRepromt(?Repromt $repromt): Response
    {
        $this->repromt = $repromt;

        return $this;
    }

    /**
     * @return AbstractDirective[]|null
     */
    public function getDirectives(): ?array
    {
        return $this->directives;
    }

    /**
     * @param AbstractDirective[]|null $directives
     *
     * @return Response
     */
    public function setDirectives(?array $directives): Response
    {
        $this->directives = $directives;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getShouldEndSession(): ?bool
    {
        return $this->shouldEndSession;
    }

    /**
     * @param bool|null $shouldEndSession
     *
     * @return Response
     */
    public function setShouldEndSession(?bool $shouldEndSession): Response
    {
        $this->shouldEndSession = $shouldEndSession;

        return $this;
    }
}
