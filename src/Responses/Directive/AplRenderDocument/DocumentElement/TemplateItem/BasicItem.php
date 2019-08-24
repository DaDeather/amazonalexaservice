<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem;

use JMS\Serializer\Annotation as JMS;

class BasicItem
{
    public const DISPLAY_NONE = 'none';
    public const DISPLAY_INVISIBLE = 'invisible';
    public const DISPLAY_NORMAL = 'normal';

    public const POSITION_ABSOLUTE = 'absolute';
    public const POSITION_RELATIVE = 'relative';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("id")
     */
    protected $id;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("when")
     */
    protected $when;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    protected $description;

    /**
     * @var Bind[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\Bind>")
     * @JMS\SerializedName("bind")
     */
    protected $bind;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("accessibilityLabel")
     */
    protected $accessibilityLabel;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("display")
     */
    protected $display;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("entity")
     */
    protected $entity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("height")
     */
    protected $height;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("minHeight")
     */
    protected $minHeight;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("maxHeight")
     */
    protected $maxHeight;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("width")
     */
    protected $width;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("minWidth")
     */
    protected $minWidth;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("maxWidth")
     */
    protected $maxWidth;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\SerializedName("opacity")
     */
    protected $opacity;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("paddingBottom")
     */
    protected $paddingBottom;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("paddingLeft")
     */
    protected $paddingLeft;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("paddingRight")
     */
    protected $paddingRight;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("paddingTop")
     */
    protected $paddingTop;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("speech")
     */
    protected $speech;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("style")
     */
    protected $style;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("transform")
     */
    protected $transform;

    /**
     * @var bool
     * @JMS\Type("bool")
     * @JMS\SerializedName("checked")
     */
    protected $checked = false;

    /**
     * @var bool
     * @JMS\Type("bool")
     * @JMS\SerializedName("disabled")
     */
    protected $disabled = false;

    /**
     * @var bool
     * @JMS\Type("bool")
     * @JMS\SerializedName("inheritParentState")
     */
    protected $inheritParentState = false;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("onMount")
     */
    protected $onMount;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("alignSelf")
     */
    protected $alignSelf;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("bottom")
     */
    protected $bottom;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("left")
     */
    protected $left;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("right")
     */
    protected $right;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("top")
     */
    protected $top;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("spacing")
     */
    protected $spacing;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("position")
     */
    protected $position;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("numbering")
     */
    protected $numbering;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\SerializedName("grow")
     */
    protected $grow;

    /**
     * @var float|null
     * @JMS\Type("float")
     * @JMS\SerializedName("shrink")
     */
    protected $shrink;

    /**
     * @return string|null
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * @param string|null $id
     *
     * @return $this
     */
    public function setId(?string $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return $this
     */
    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWhen(): ?string
    {
        return $this->when;
    }

    /**
     * @param string|null $when
     *
     * @return $this
     */
    public function setWhen(?string $when): self
    {
        $this->when = $when;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     *
     * @return $this
     */
    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Bind[]|null
     */
    public function getBind(): ?array
    {
        return $this->bind;
    }

    /**
     * @param Bind[]|null $bind
     *
     * @return $this
     */
    public function setBind(?array $bind): self
    {
        $this->bind = $bind;

        return $this;
    }

    /**
     * @param Bind $bind
     *
     * @return $this
     */
    public function addBind(Bind $bind): self
    {
        if (!$this->bind) {
            $this->bind = [];
        }

        $this->bind[] = $bind;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAccessibilityLabel(): ?string
    {
        return $this->accessibilityLabel;
    }

    /**
     * @param string|null $accessibilityLabel
     *
     * @return $this
     */
    public function setAccessibilityLabel(?string $accessibilityLabel): self
    {
        $this->accessibilityLabel = $accessibilityLabel;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDisplay(): ?string
    {
        return $this->display;
    }

    /**
     * @param string|null $display
     *
     * @return $this
     */
    public function setDisplay(?string $display): self
    {
        $this->display = $display;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getEntity(): ?array
    {
        return $this->entity;
    }

    /**
     * @param array|null $entity
     *
     * @return $this
     */
    public function setEntity(?array $entity): self
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeight(): ?string
    {
        return $this->height;
    }

    /**
     * @param string|null $height
     *
     * @return $this
     */
    public function setHeight(?string $height): self
    {
        $this->height = $height;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMinHeight(): ?string
    {
        return $this->minHeight;
    }

    /**
     * @param string|null $minHeight
     *
     * @return $this
     */
    public function setMinHeight(?string $minHeight): self
    {
        $this->minHeight = $minHeight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMaxHeight(): ?string
    {
        return $this->maxHeight;
    }

    /**
     * @param string|null $maxHeight
     *
     * @return $this
     */
    public function setMaxHeight(?string $maxHeight): self
    {
        $this->maxHeight = $maxHeight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getWidth(): ?string
    {
        return $this->width;
    }

    /**
     * @param string|null $width
     *
     * @return $this
     */
    public function setWidth(?string $width): self
    {
        $this->width = $width;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMinWidth(): ?string
    {
        return $this->minWidth;
    }

    /**
     * @param string|null $minWidth
     *
     * @return $this
     */
    public function setMinWidth(?string $minWidth): self
    {
        $this->minWidth = $minWidth;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getMaxWidth(): ?string
    {
        return $this->maxWidth;
    }

    /**
     * @param string|null $maxWidth
     *
     * @return $this
     */
    public function setMaxWidth(?string $maxWidth): self
    {
        $this->maxWidth = $maxWidth;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getOpacity(): ?float
    {
        return $this->opacity;
    }

    /**
     * @param float|null $opacity
     *
     * @return $this
     */
    public function setOpacity(?float $opacity): self
    {
        $this->opacity = $opacity;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaddingBottom(): ?string
    {
        return $this->paddingBottom;
    }

    /**
     * @param string|null $paddingBottom
     *
     * @return $this
     */
    public function setPaddingBottom(?string $paddingBottom): self
    {
        $this->paddingBottom = $paddingBottom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaddingLeft(): ?string
    {
        return $this->paddingLeft;
    }

    /**
     * @param string|null $paddingLeft
     *
     * @return $this
     */
    public function setPaddingLeft(?string $paddingLeft): self
    {
        $this->paddingLeft = $paddingLeft;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaddingRight(): ?string
    {
        return $this->paddingRight;
    }

    /**
     * @param string|null $paddingRight
     *
     * @return $this
     */
    public function setPaddingRight(?string $paddingRight): self
    {
        $this->paddingRight = $paddingRight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPaddingTop(): ?string
    {
        return $this->paddingTop;
    }

    /**
     * @param string|null $paddingTop
     *
     * @return $this
     */
    public function setPaddingTop(?string $paddingTop): self
    {
        $this->paddingTop = $paddingTop;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSpeech(): ?string
    {
        return $this->speech;
    }

    /**
     * @param string|null $speech
     *
     * @return $this
     */
    public function setSpeech(?string $speech): self
    {
        $this->speech = $speech;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getStyle(): ?string
    {
        return $this->style;
    }

    /**
     * @param string|null $style
     *
     * @return $this
     */
    public function setStyle(?string $style): self
    {
        $this->style = $style;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getTransform(): ?array
    {
        return $this->transform;
    }

    /**
     * @param array|null $transform
     *
     * @return $this
     */
    public function setTransform(?array $transform): self
    {
        $this->transform = $transform;

        return $this;
    }

    /**
     * @param string $transformation
     * @param string $transformValue
     * @param int    $transformIndex
     *
     * @return $this
     */
    public function addTransform(string $transformation, string $transformValue, int $transformIndex = 0): self
    {
        if (!$this->transform) {
            $this->transform = [];
        }

        $this->transform[$transformIndex][$transformation] = $transformValue;

        return $this;
    }

    /**
     * @return bool
     */
    public function isChecked(): bool
    {
        return $this->checked;
    }

    /**
     * @param bool $checked
     *
     * @return $this
     */
    public function setChecked(bool $checked): self
    {
        $this->checked = $checked;

        return $this;
    }

    /**
     * @return bool
     */
    public function isDisabled(): bool
    {
        return $this->disabled;
    }

    /**
     * @param bool $disabled
     *
     * @return $this
     */
    public function setDisabled(bool $disabled): self
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * @return bool
     */
    public function isInheritParentState(): bool
    {
        return $this->inheritParentState;
    }

    /**
     * @param bool $inheritParentState
     *
     * @return $this
     */
    public function setInheritParentState(bool $inheritParentState): self
    {
        $this->inheritParentState = $inheritParentState;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getOnMount(): ?array
    {
        return $this->onMount;
    }

    /**
     * @param array|null $onMount
     *
     * @return $this
     */
    public function setOnMount(?array $onMount): self
    {
        $this->onMount = $onMount;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getAlignSelf(): ?string
    {
        return $this->alignSelf;
    }

    /**
     * @param string|null $alignSelf
     *
     * @return $this
     */
    public function setAlignSelf(?string $alignSelf): self
    {
        $this->alignSelf = $alignSelf;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getBottom(): ?string
    {
        return $this->bottom;
    }

    /**
     * @param string|null $bottom
     *
     * @return $this
     */
    public function setBottom(?string $bottom): self
    {
        $this->bottom = $bottom;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLeft(): ?string
    {
        return $this->left;
    }

    /**
     * @param string|null $left
     *
     * @return $this
     */
    public function setLeft(?string $left): self
    {
        $this->left = $left;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRight(): ?string
    {
        return $this->right;
    }

    /**
     * @param string|null $right
     *
     * @return $this
     */
    public function setRight(?string $right): self
    {
        $this->right = $right;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTop(): ?string
    {
        return $this->top;
    }

    /**
     * @param string|null $top
     *
     * @return $this
     */
    public function setTop(?string $top): self
    {
        $this->top = $top;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSpacing(): ?string
    {
        return $this->spacing;
    }

    /**
     * @param string|null $spacing
     *
     * @return $this
     */
    public function setSpacing(?string $spacing): self
    {
        $this->spacing = $spacing;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getPosition(): ?string
    {
        return $this->position;
    }

    /**
     * @param string|null $position
     *
     * @return $this
     */
    public function setPosition(?string $position): self
    {
        $this->position = $position;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumbering(): ?string
    {
        return $this->numbering;
    }

    /**
     * @param string|null $numbering
     *
     * @return $this
     */
    public function setNumbering(?string $numbering): self
    {
        $this->numbering = $numbering;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getGrow(): ?float
    {
        return $this->grow;
    }

    /**
     * @param float|null $grow
     *
     * @return $this
     */
    public function setGrow(?float $grow): self
    {
        $this->grow = $grow;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getShrink(): ?float
    {
        return $this->shrink;
    }

    /**
     * @param float|null $shrink
     *
     * @return $this
     */
    public function setShrink(?float $shrink): self
    {
        $this->shrink = $shrink;

        return $this;
    }
}
