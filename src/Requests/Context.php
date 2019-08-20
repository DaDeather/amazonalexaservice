<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class Context
{
    /**
     * @var System|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\System")
     * @JMS\SerializedName("System")
     */
    protected $system;

    /**
     * @var AudioPlayer|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\AudioPlayer")
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
