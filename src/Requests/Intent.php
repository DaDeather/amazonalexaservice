<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

class Intent
{
    public const CONFIRMATION_STATUS_NONE = 'NONE';
    public const CONFIRMATION_STATUS_CONFIRMED = 'CONFIRMED';
    public const CONFIRMATION_STATUS_DENIED = 'DENIED';

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("confirmationStatus")
     */
    protected $confirmationStatus;

    /**
     * @var array|null
     * @JMS\Type("array<string, DaDaDev\AmazonAlexa\Requests\Slot>")
     */
    protected $slots;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getConfirmationStatus(): ?string
    {
        return $this->confirmationStatus;
    }

    /**
     * @return array|null
     */
    public function getSlots(): ?array
    {
        return $this->slots;
    }
}
