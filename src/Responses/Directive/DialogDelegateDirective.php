<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive;

use DaDaDev\AmazonAlexa\Responses\Directive\DialogDelegate\UpdatedIntent;
use JMS\Serializer\Annotation as JMS;

class DialogDelegateDirective extends AbstractDirective
{
    /**
     * @var UpdatedIntent|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Directive\DialogDelegate\UpdatedIntent")
     * @JMS\SerializedName("updatedIntent")
     */
    protected $updatedIntent;

    public function __construct()
    {
        $this->setType(self::TYPE_DIALOG_DELEGATE);
    }

    /**
     * @return UpdatedIntent|null
     */
    public function getUpdatedIntent(): ?UpdatedIntent
    {
        return $this->updatedIntent;
    }

    /**
     * @param UpdatedIntent|null $updatedIntent
     *
     * @return $this
     */
    public function setUpdatedIntent(?UpdatedIntent $updatedIntent): self
    {
        $this->updatedIntent = $updatedIntent;

        return $this;
    }
}
