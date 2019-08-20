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
}
