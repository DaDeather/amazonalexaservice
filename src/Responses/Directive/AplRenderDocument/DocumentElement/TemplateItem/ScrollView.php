<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem;

use JMS\Serializer\Annotation as JMS;

class ScrollView extends BasicItem
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'ScrollView';

    /**
     * @var BasicItem[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\BasicItem>")
     * @JMS\SerializedName("items")
     */
    protected $items;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("onScroll")
     */
    protected $onScroll;

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
     * @return array|null
     */
    public function getOnScroll(): ?array
    {
        return $this->onScroll;
    }

    /**
     * @param array|null $onScroll
     *
     * @return $this
     */
    public function setOnScroll(?array $onScroll): self
    {
        $this->onScroll = $onScroll;

        return $this;
    }
}
