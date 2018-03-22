<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class IntentRequest
 */
class IntentRequest extends LaunchRequest
{
    public const DIALOG_STATE_STARTED = 'STARTED';
    public const DIALOG_STATE_IN_PROGRESS = 'IN_PROGRESS';
    public const DIALOG_STATE_COMPLETED = 'COMPLETED';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("dialogState")
     */
    protected $dialogState;

    /**
     * @var Intent|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Intent")
     */
    protected $intent;

    /**
     * @return Intent|null
     */
    public function getIntent(): ?Intent
    {
        return $this->intent;
    }

    /**
     * @param Intent|null $intent
     * @return IntentRequest
     */
    public function setIntent(?Intent $intent): IntentRequest
    {
        $this->intent = $intent;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getDialogState(): ?string
    {
        return $this->dialogState;
    }

    /**
     * @param null|string $dialogState
     * @return IntentRequest
     */
    public function setDialogState(?string $dialogState): IntentRequest
    {
        $this->dialogState = $dialogState;
        return $this;
    }
}