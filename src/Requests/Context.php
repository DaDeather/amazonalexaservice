<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Context
 */
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
     * @param System|null $system
     * @return Context
     */
    public function setSystem(?System $system): Context
    {
        $this->system = $system;
        return $this;
    }

    /**
     * @return AudioPlayer|null
     */
    public function getAudioPlayer(): ?AudioPlayer
    {
        return $this->audioPlayer;
    }

    /**
     * @param AudioPlayer|null $audioPlayer
     * @return Context
     */
    public function setAudioPlayer(?AudioPlayer $audioPlayer): Context
    {
        $this->audioPlayer = $audioPlayer;
        return $this;
    }
}