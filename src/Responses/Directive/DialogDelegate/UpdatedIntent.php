<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\DialogDelegate;

use DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Intent;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Slot;

class UpdatedIntent extends Intent
{
    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param string|null $confirmationStatus
     *
     * @return $this
     */
    public function setConfirmationStatus(?string $confirmationStatus): self
    {
        $this->confirmationStatus = $confirmationStatus;

        return $this;
    }

    /**
     * @param Slot[]|null $slots
     *
     * @return $this
     */
    public function setSlots(?array $slots): self
    {
        $this->slots = $slots;

        return $this;
    }

    /**
     * @param string $slotName
     * @param Slot   $slot
     *
     * @return $this
     */
    public function setSlot(string $slotName, Slot $slot): self
    {
        $this->slots[$slotName] = $slot;

        return $this;
    }
}
