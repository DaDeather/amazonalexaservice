<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplExecuteCommand;

use JMS\Serializer\Annotation as JMS;

class SpeakItemCommand extends AplCommand
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("componentId")
     */
    protected $align;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("componentId")
     */
    protected $componentId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("highlightMode")
     */
    protected $highlightMode = 'block';

    /**
     * @var int
     * @JMS\Type("int")
     * @JMS\SerializedName("minimumDwellTime")
     */
    protected $minimumDwellTime;

    public function __construct()
    {
        parent::__construct(self::COMMAND_TYPE_SPEAK_ITEM);
    }

    /**
     * @return string|null
     */
    public function getAlign(): ?string
    {
        return $this->align;
    }

    /**
     * @param string|null $align
     *
     * @return $this
     */
    public function setAlign(?string $align): self
    {
        $this->align = $align;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getComponentId(): ?string
    {
        return $this->componentId;
    }

    /**
     * @param string|null $componentId
     *
     * @return $this
     */
    public function setComponentId(?string $componentId): self
    {
        $this->componentId = $componentId;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHighlightMode(): ?string
    {
        return $this->highlightMode;
    }

    /**
     * @param string|null $highlightMode
     *
     * @return $this
     */
    public function setHighlightMode(?string $highlightMode): self
    {
        $this->highlightMode = $highlightMode;

        return $this;
    }

    /**
     * @return int
     */
    public function getMinimumDwellTime(): int
    {
        return $this->minimumDwellTime;
    }

    /**
     * @param int $minimumDwellTime
     *
     * @return $this
     */
    public function setMinimumDwellTime(int $minimumDwellTime): self
    {
        $this->minimumDwellTime = $minimumDwellTime;

        return $this;
    }
}
