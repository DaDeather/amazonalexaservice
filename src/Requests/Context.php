<?php

namespace DaDaDev\AmazonAlexa\Requests;

use DaDaDev\AmazonAlexa\Requests\ContextElements\AudioPlayer;
use DaDaDev\AmazonAlexa\Requests\ContextElements\System;
use JMS\Serializer\Annotation as JMS;

class Context
{
    /**
     * @var System|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\System")
     * @JMS\SerializedName("System")
     */
    protected $system;

    /**
     * @var AudioPlayer|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\AudioPlayer")
     * @JMS\SerializedName("AudioPlayer")
     */
    protected $audioPlayer;

    /**
     * @return System|null
     */
    public function getSystem(): ?System
    {
        return $this->system;
    }

    /**
     * @return AudioPlayer|null
     */
    public function getAudioPlayer(): ?AudioPlayer
    {
        return $this->audioPlayer;
    }
}
