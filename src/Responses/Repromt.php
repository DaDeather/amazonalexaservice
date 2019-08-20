<?php

namespace DaDaDev\AmazonAlexa\Responses;

use JMS\Serializer\Annotation as JMS;

class Repromt
{
    /**
     * @var OutputSpeech|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\OutputSpeech")
     * @JMS\SerializedName("outputSpeech")
     */
    protected $outputSpeech;

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
     * @return Repromt
     */
    public function setOutputSpeech(?OutputSpeech $outputSpeech): Repromt
    {
        $this->outputSpeech = $outputSpeech;

        return $this;
    }
}
