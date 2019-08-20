<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement;

use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\BasicItem;
use JMS\Serializer\Annotation as JMS;

class AplMainTemplate
{
    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("parameters")
     */
    protected $parameters;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    protected $description;

    /**
     * @var BasicItem[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\TemplateItem\BasicItem>")
     * @JMS\SerializedName("items")
     */
    protected $items;

    /**
     * @return string[]|null
     */
    public function getParameters(): ?array
    {
        return $this->parameters;
    }

    /**
     * @param string[]|null $parameters
     *
     * @return $this
     */
    public function setParameters(?array $parameters): self
    {
        $this->parameters = $parameters;

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
}
