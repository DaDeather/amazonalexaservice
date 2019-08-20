<?php

namespace DaDaDev\AmazonAlexa\Requests;

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
     * @return string|null
     */
    public function getDialogState(): ?string
    {
        return $this->dialogState;
    }
}
