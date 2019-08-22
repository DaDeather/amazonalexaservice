<?php

namespace DaDaDev\AmazonAlexa\Requests;

use DaDaDev\AmazonAlexa\Requests\ContextElements\AudioPlayer;
use DaDaDev\AmazonAlexa\Requests\ContextElements\NullAudioPlayer;
use DaDaDev\AmazonAlexa\Requests\ContextElements\NullSystem;
use DaDaDev\AmazonAlexa\Requests\ContextElements\System;
use JMS\Serializer\Annotation as JMS;

class Context
{
    /**
     * @var System
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\System")
     * @JMS\SerializedName("System")
     */
    protected $system;

    /**
     * @var AudioPlayer
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\ContextElements\AudioPlayer")
     * @JMS\SerializedName("AudioPlayer")
     */
    protected $audioPlayer;

    /**
     * @return System
     */
    public function getSystem(): System
    {
        return $this->system ?? new NullSystem();
    }

    /**
     * @return AudioPlayer
     */
    public function getAudioPlayer(): AudioPlayer
    {
        return $this->audioPlayer ?? new NullAudioPlayer();
    }
}
