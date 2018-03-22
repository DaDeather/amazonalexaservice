<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Intent
 */
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
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Intent
     */
    public function setName(?string $name): Intent
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getConfirmationStatus(): ?string
    {
        return $this->confirmationStatus;
    }

    /**
     * @param null|string $confirmationStatus
     * @return Intent
     */
    public function setConfirmationStatus(?string $confirmationStatus): Intent
    {
        $this->confirmationStatus = $confirmationStatus;
        return $this;
    }

    /**
     * @return array|null
     */
    public function getSlots(): ?array
    {
        return $this->slots;
    }

    /**
     * @param array|null $slots
     * @return Intent
     */
    public function setSlots(?array $slots): Intent
    {
        $this->slots = $slots;
        return $this;
    }
}