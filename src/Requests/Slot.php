<?php

namespace DaDaDev\AmazonAlexa\Requests;

use JMS\Serializer\Annotation as JMS;

/**
 * Class Slot
 */
class Slot
{
    /**#@+
     * @var string
     */
    public const CONFIRMATION_STATUS_NONE = 'NONE';
    public const CONFIRMATION_STATUS_CONFIRMED = 'CONFIRMED';
    public const CONFIRMATION_STATUS_DENIED = 'DENIED';
    /**#@-*/

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $value;

    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $confirmationStatus;

    /**
     * @var Resolution|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Resolution")
     */
    protected $resolutions;

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param null|string $name
     * @return Slot
     */
    public function setName(?string $name): Slot
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return null|string
     */
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @param null|string $value
     * @return Slot
     */
    public function setValue(?string $value): Slot
    {
        $this->value = $value;
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
     * @return Slot
     */
    public function setConfirmationStatus(?string $confirmationStatus): Slot
    {
        $this->confirmationStatus = $confirmationStatus;
        return $this;
    }

    /**
     * @return Resolution|null
     */
    public function getResolutions(): ?Resolution
    {
        return $this->resolutions;
    }

    /**
     * @param Resolution|null $resolutions
     * @return Slot
     */
    public function setResolutions(?Resolution $resolutions): Slot
    {
        $this->resolutions = $resolutions;
        return $this;
    }
}