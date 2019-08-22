<?php

namespace DaDaDev\AmazonAlexa\Requests;

use DaDaDev\AmazonAlexa\Requests\ContextElements\AudioPlayer;
use DaDaDev\AmazonAlexa\Requests\ContextElements\NullAudioPlayer;
use DaDaDev\AmazonAlexa\Requests\ContextElements\NullSystem;
use DaDaDev\AmazonAlexa\Requests\ContextElements\System;

class NullContext extends Context
{
    /**
     * @return System
     */
    public function getSystem(): System
    {
        return new NullSystem();
    }

    /**
     * @return AudioPlayer
     */
    public function getAudioPlayer(): AudioPlayer
    {
        return new NullAudioPlayer();
    }
}
