<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Intent;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\NullIntent;
use JMS\Serializer\Annotation as JMS;

class IntentRequest extends AbstractRequest
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
     * @var Intent
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Intent")
     */
    protected $intent;

    /**
     * @return string
     */
    public function getType(): string
    {
        return self::TYPE_INTENT_REQUEST;
    }

    /**
     * @return Intent
     */
    public function getIntent(): Intent
    {
        return $this->intent ?? new NullIntent();
    }

    /**
     * @return string|null
     */
    public function getDialogState(): ?string
    {
        return $this->dialogState;
    }
}
