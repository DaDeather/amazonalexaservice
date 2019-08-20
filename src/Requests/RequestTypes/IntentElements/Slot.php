<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements;

use JMS\Serializer\Annotation as JMS;

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
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentElements\Resolution")
     */
    protected $resolutions;

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
    public function getValue(): ?string
    {
        return $this->value;
    }

    /**
     * @return string|null
     */
    public function getConfirmationStatus(): ?string
    {
        return $this->confirmationStatus;
    }

    /**
     * @return Resolution|null
     */
    public function getResolutions(): ?Resolution
    {
        return $this->resolutions;
    }
}
