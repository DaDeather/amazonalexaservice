<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem;

use JMS\Serializer\Annotation as JMS;

class AlexaHeader extends BasicItem
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'AlexaHeader';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("headerAttributionImage")
     */
    protected $headerAttributionImage;

    /**
     * @var bool|null
     * @JMS\Type("bool")
     * @JMS\SerializedName("headerAttributionPrimacy")
     */
    protected $headerAttributionPrimacy;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("headerAttributionText")
     */
    protected $headerAttributionText;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("headerBackButtonAccessibilityLabel")
     */
    protected $headerBackButtonAccessibilityLabel;

    /**
     * @var bool|null
     * @JMS\Type("bool")
     * @JMS\SerializedName("headerBackButton")
     */
    protected $headerBackButton;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("headerBackgroundColor")
     */
    protected $headerBackgroundColor;

    /**
     * @var bool|null
     * @JMS\Type("bool")
     * @JMS\SerializedName("headerDivider")
     */
    protected $headerDivider;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("headerSubtitle")
     */
    protected $headerSubtitle;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("headerTitle")
     */
    protected $headerTitle;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("theme")
     */
    protected $theme;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @return string|null
     */
    public function getHeaderAttributionImage(): ?string
    {
        return $this->headerAttributionImage;
    }

    /**
     * @param string|null $headerAttributionImage
     *
     * @return $this
     */
    public function setHeaderAttributionImage(?string $headerAttributionImage): self
    {
        $this->headerAttributionImage = $headerAttributionImage;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHeaderAttributionPrimacy(): ?bool
    {
        return $this->headerAttributionPrimacy;
    }

    /**
     * @param bool|null $headerAttributionPrimacy
     *
     * @return $this
     */
    public function setHeaderAttributionPrimacy(?bool $headerAttributionPrimacy): self
    {
        $this->headerAttributionPrimacy = $headerAttributionPrimacy;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeaderAttributionText(): ?string
    {
        return $this->headerAttributionText;
    }

    /**
     * @param string|null $headerAttributionText
     *
     * @return $this
     */
    public function setHeaderAttributionText(?string $headerAttributionText): self
    {
        $this->headerAttributionText = $headerAttributionText;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeaderBackButtonAccessibilityLabel(): ?string
    {
        return $this->headerBackButtonAccessibilityLabel;
    }

    /**
     * @param string|null $headerBackButtonAccessibilityLabel
     *
     * @return $this
     */
    public function setHeaderBackButtonAccessibilityLabel(?string $headerBackButtonAccessibilityLabel): self
    {
        $this->headerBackButtonAccessibilityLabel = $headerBackButtonAccessibilityLabel;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHeaderBackButton(): ?bool
    {
        return $this->headerBackButton;
    }

    /**
     * @param bool|null $headerBackButton
     *
     * @return $this
     */
    public function setHeaderBackButton(?bool $headerBackButton): self
    {
        $this->headerBackButton = $headerBackButton;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeaderBackgroundColor(): ?string
    {
        return $this->headerBackgroundColor;
    }

    /**
     * @param string|null $headerBackgroundColor
     *
     * @return $this
     */
    public function setHeaderBackgroundColor(?string $headerBackgroundColor): self
    {
        $this->headerBackgroundColor = $headerBackgroundColor;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getHeaderDivider(): ?bool
    {
        return $this->headerDivider;
    }

    /**
     * @param bool|null $headerDivider
     *
     * @return $this
     */
    public function setHeaderDivider(?bool $headerDivider): self
    {
        $this->headerDivider = $headerDivider;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeaderSubtitle(): ?string
    {
        return $this->headerSubtitle;
    }

    /**
     * @param string|null $headerSubtitle
     *
     * @return $this
     */
    public function setHeaderSubtitle(?string $headerSubtitle): self
    {
        $this->headerSubtitle = $headerSubtitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getHeaderTitle(): ?string
    {
        return $this->headerTitle;
    }

    /**
     * @param string|null $headerTitle
     *
     * @return $this
     */
    public function setHeaderTitle(?string $headerTitle): self
    {
        $this->headerTitle = $headerTitle;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTheme(): ?string
    {
        return $this->theme;
    }

    /**
     * @param string|null $theme
     *
     * @return $this
     */
    public function setTheme(?string $theme): self
    {
        $this->theme = $theme;

        return $this;
    }
}
