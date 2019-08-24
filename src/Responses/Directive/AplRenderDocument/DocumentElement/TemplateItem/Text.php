<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem;

use JMS\Serializer\Annotation as JMS;

class Text extends BasicItem
{
    public const TEXT_ALIGN_LEFT = 'left';
    public const TEXT_ALIGN_CENTER = 'center';
    public const TEXT_ALIGN_RIGHT = 'right';
    public const TEXT_ALIGN_AUTO = 'auto';

    public const FONT_STYLE_NORMAL = 'normal';
    public const FONT_STYLE_ITALIC = 'italic';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'Text';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("text")
     */
    protected $text;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("color")
     */
    protected $color;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("textAlign")
     */
    protected $textAlign;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("textAlignVertical")
     */
    protected $textAlignVertical;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("fontFamily")
     */
    protected $fontFamily;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("fontSize")
     */
    protected $fontSize;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("fontStyle")
     */
    protected $fontStyle;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("fontWeight")
     */
    protected $fontWeight;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("letterSpacing")
     */
    protected $letterSpacing;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("lineHeight")
     */
    protected $lineHeight;

    /**
     * @var int|null
     * @JMS\Type("int")
     * @JMS\SerializedName("maxLines")
     */
    protected $maxLines;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * @param string|null $text
     *
     * @return $this
     */
    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->color;
    }

    /**
     * @param string|null $color
     *
     * @return $this
     */
    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTextAlign(): ?string
    {
        return $this->textAlign;
    }

    /**
     * @param string|null $textAlign
     *
     * @return $this
     */
    public function setTextAlign(?string $textAlign): self
    {
        $this->textAlign = $textAlign;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTextAlignVertical(): ?string
    {
        return $this->textAlignVertical;
    }

    /**
     * @param string|null $textAlignVertical
     *
     * @return $this
     */
    public function setTextAlignVertical(?string $textAlignVertical): self
    {
        $this->textAlignVertical = $textAlignVertical;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFontFamily(): ?string
    {
        return $this->fontFamily;
    }

    /**
     * @param string|null $fontFamily
     *
     * @return $this
     */
    public function setFontFamily(?string $fontFamily): self
    {
        $this->fontFamily = $fontFamily;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFontSize(): ?string
    {
        return $this->fontSize;
    }

    /**
     * @param string|null $fontSize
     *
     * @return $this
     */
    public function setFontSize(?string $fontSize): self
    {
        $this->fontSize = $fontSize;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFontStyle(): ?string
    {
        return $this->fontStyle;
    }

    /**
     * @param string|null $fontStyle
     *
     * @return $this
     */
    public function setFontStyle(?string $fontStyle): self
    {
        $this->fontStyle = $fontStyle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFontWeight(): ?string
    {
        return $this->fontWeight;
    }

    /**
     * @param string|null $fontWeight
     *
     * @return $this
     */
    public function setFontWeight(?string $fontWeight): self
    {
        $this->fontWeight = $fontWeight;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLetterSpacing(): ?string
    {
        return $this->letterSpacing;
    }

    /**
     * @param string|null $letterSpacing
     *
     * @return $this
     */
    public function setLetterSpacing(?string $letterSpacing): self
    {
        $this->letterSpacing = $letterSpacing;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getLineHeight(): ?string
    {
        return $this->lineHeight;
    }

    /**
     * @param string|null $lineHeight
     *
     * @return $this
     */
    public function setLineHeight(?string $lineHeight): self
    {
        $this->lineHeight = $lineHeight;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxLines(): ?int
    {
        return $this->maxLines;
    }

    /**
     * @param int|null $maxLines
     *
     * @return $this
     */
    public function setMaxLines(?int $maxLines): self
    {
        $this->maxLines = $maxLines;

        return $this;
    }
}
