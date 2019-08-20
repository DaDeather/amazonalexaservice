<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem;

use JMS\Serializer\Annotation as JMS;

class Container extends BasicItem
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'Container';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("alignItems")
     */
    protected $alignItems;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("direction")
     */
    protected $direction;

    /**
     * @var BasicItem[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\BasicItem>")
     * @JMS\SerializedName("firstItem")
     */
    protected $firstItem;

    /**
     * @var BasicItem[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\BasicItem>")
     * @JMS\SerializedName("items")
     */
    protected $items;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("justifyContent")
     */
    protected $justifyContent;

    /**
     * @var BasicItem[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\BasicItem>")
     * @JMS\SerializedName("lastItem")
     */
    protected $lastItem;

    /**
     * @var bool|null
     * @JMS\Type("bool")
     * @JMS\SerializedName("numbered")
     */
    protected $numbered;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("data")
     */
    protected $data;

    /**
     * @return string|null
     */
    public function getAlignItems(): ?string
    {
        return $this->alignItems;
    }

    /**
     * @param string|null $alignItems
     *
     * @return $this
     */
    public function setAlignItems(?string $alignItems): self
    {
        $this->alignItems = $alignItems;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDirection(): ?string
    {
        return $this->direction;
    }

    /**
     * @param string|null $direction
     *
     * @return $this
     */
    public function setDirection(?string $direction): self
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return BasicItem[]|null
     */
    public function getFirstItem(): ?array
    {
        return $this->firstItem;
    }

    /**
     * @param BasicItem[]|null $firstItem
     *
     * @return $this
     */
    public function setFirstItem(?array $firstItem): self
    {
        $this->firstItem = $firstItem;

        return $this;
    }

    /**
     * @param BasicItem $firstItem
     *
     * @return $this
     */
    public function addFirstItem(BasicItem $firstItem): self
    {
        if (!$this->firstItem) {
            $this->firstItem = [];
        }

        $this->firstItem[] = $firstItem;

        return $this;
    }

    /**
     * @return BasicItem[]|null
     */
    public function getItems(): ?array
    {
        return $this->items;
    }

    /**
     * @param BasicItem[]|null $items
     *
     * @return $this
     */
    public function setItems(?array $items): self
    {
        $this->items = $items;

        return $this;
    }

    /**
     * @param BasicItem $item
     *
     * @return $this
     */
    public function addItem(BasicItem $item): self
    {
        if (!$this->items) {
            $this->items = [];
        }

        $this->items[] = $item;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getJustifyContent(): ?string
    {
        return $this->justifyContent;
    }

    /**
     * @param string|null $justifyContent
     *
     * @return $this
     */
    public function setJustifyContent(?string $justifyContent): self
    {
        $this->justifyContent = $justifyContent;

        return $this;
    }

    /**
     * @return BasicItem[]|null
     */
    public function getLastItem(): ?array
    {
        return $this->lastItem;
    }

    /**
     * @param BasicItem[]|null $lastItem
     *
     * @return $this
     */
    public function setLastItem(?array $lastItem): self
    {
        $this->lastItem = $lastItem;

        return $this;
    }

    /**
     * @param BasicItem $lastItem
     *
     * @return $this
     */
    public function addLastItem(BasicItem $lastItem): self
    {
        if (!$this->lastItem) {
            $this->lastItem = [];
        }

        $this->lastItem[] = $lastItem;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNumbered(): ?bool
    {
        return $this->numbered;
    }

    /**
     * @param bool|null $numbered
     *
     * @return $this
     */
    public function setNumbered(?bool $numbered): self
    {
        $this->numbered = $numbered;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getData(): ?array
    {
        return $this->data;
    }

    /**
     * @param array|null $data
     *
     * @return $this
     */
    public function setData(?array $data): self
    {
        $this->data = $data;

        return $this;
    }
}
