<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class AudioPlayer
{
    /**
     * Nothing was playing, no enqueued items.
     */
    public const PLAYER_IDLE = 'IDLE';

    /**
     * Stream was paused.
     */
    public const PLAYER_PAUSED = 'PAUSED';

    /**
     * Stream was playing.
     */
    public const PLAYER_PLAYING = 'PLAYING';

    /**
     * Buffer underrun.
     */
    public const PLAYER_BUFFER_UNDERRUN = 'BUFFER_UNDERRUN';

    /**
     * Stream was finished playing.
     */
    public const PLAYER_FINISHED = 'FINISHED';

    /**
     * Stream was interrupted.
     */
    public const PLAYER_STOPPED = 'STOPPED';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("playerActivity")
     */
    private $playerActivity;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    private $token;

    /**
     * @var int|null
     * @JMS\Type("integer")
     * @JMS\SerializedName("offsetInMilliseconds")
     */
    private $offsetInMilliseconds;

    /**
     * @return string|null
     */
    public function getPlayerActivity(): ?string
    {
        return $this->playerActivity;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return int|null
     */
    public function getOffsetInMilliseconds(): ?int
    {
        return $this->offsetInMilliseconds;
    }
}
