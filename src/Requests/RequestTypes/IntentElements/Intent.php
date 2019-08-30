<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements;

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
     * @JMS\Type("array<string, DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Slot>")
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
     * @return array
     */
    public function getSlots(): array
    {
        return $this->slots ?? [];
    }

    /**
     * @param string $slotName
     *
     * @return bool
     */
    public function hasSlot(string $slotName): bool
    {
        return isset($this->slots[$slotName]);
    }

    /**
     * @param string $slotName
     *
     * @return Slot
     */
    public function getSlot(string $slotName): Slot
    {
        return $this->slots[$slotName] ?? new NullSlot();
    }
}
