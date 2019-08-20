<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem;

use JMS\Serializer\Annotation as JMS;

class Image extends BasicItem
{
    public const ALIGN_BOTTOM = 'bottom';
    public const ALIGN_BOTTOM_LEFT = 'bottom-left';
    public const ALIGN_BOTTOM_RIGHT = 'bottom-right';
    public const ALIGN_CENTER = 'center';
    public const ALIGN_LEFT = 'left';
    public const ALIGN_RIGHT = 'right';
    public const ALIGN_TOP = 'top';
    public const ALIGN_TOP_LEFT = 'top-left';
    public const ALIGN_TOP_RIGHT = 'top-right';

    public const SCALE_NONE = 'none';
    public const SCALE_FILL = 'fill';
    public const SCALE_BEST_FILL = 'best-fill';
    public const SCALE_BEST_FIT = 'best-fit';
    public const SCALE_BEST_FIT_DOWN = 'best-fit-down';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'Image';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("source")
     */
    protected $source;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("align")
     */
    protected $align;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("borderRadius")
     */
    protected $borderRadius;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("filters")
     */
    protected $filters;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("overlayColor")
     */
    protected $overlayColor;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("overlayGradient")
     */
    protected $overlayGradient;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("scale")
     */
    protected $scale;

    /**
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string|null $source
     *
     * @return $this
     */
    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
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
    public function getBorderRadius(): ?string
    {
        return $this->borderRadius;
    }

    /**
     * @param string|null $borderRadius
     *
     * @return $this
     */
    public function setBorderRadius(?string $borderRadius): self
    {
        $this->borderRadius = $borderRadius;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getFilters(): ?array
    {
        return $this->filters;
    }

    /**
     * @param array|null $filters
     *
     * @return $this
     */
    public function setFilters(?array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOverlayColor(): ?string
    {
        return $this->overlayColor;
    }

    /**
     * @param string|null $overlayColor
     *
     * @return $this
     */
    public function setOverlayColor(?string $overlayColor): self
    {
        $this->overlayColor = $overlayColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getOverlayGradient(): ?string
    {
        return $this->overlayGradient;
    }

    /**
     * @param string|null $overlayGradient
     *
     * @return $this
     */
    public function setOverlayGradient(?string $overlayGradient): self
    {
        $this->overlayGradient = $overlayGradient;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getScale(): ?string
    {
        return $this->scale;
    }

    /**
     * @param string|null $scale
     *
     * @return $this
     */
    public function setScale(?string $scale): self
    {
        $this->scale = $scale;

        return $this;
    }
}
