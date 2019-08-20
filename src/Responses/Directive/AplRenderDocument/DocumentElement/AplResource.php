<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement;

use JMS\Serializer\Annotation as JMS;

class AplResource
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("when")
     */
    protected $when;

    /**
     * @var AplResource[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplResource>")
     * @JMS\SerializedName("resources")
     */
    protected $resources;

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("name")
     */
    protected $boolean;

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("colors")
     */
    protected $colors;

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("dimensions")
     */
    protected $dimensions;

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("strings")
     */
    protected $strings;

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
     * @return AplResource[]|null
     */
    public function getResources(): ?array
    {
        return $this->resources;
    }

    /**
     * @param AplResource[]|null $resources
     *
     * @return $this
     */
    public function setResources(?array $resources): self
    {
        $this->resources = $resources;

        return $this;
    }

    /**
     * @param AplResource $resource
     *
     * @return $this
     */
    public function addResource(AplResource $resource): self
    {
        if (!$this->resources) {
            $this->resources = [];
        }

        $this->resources[] = $resource;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getBoolean(): ?array
    {
        return $this->boolean;
    }

    /**
     * @param string[]|null $boolean
     *
     * @return $this
     */
    public function setBoolean(?array $boolean): self
    {
        $this->boolean = $boolean;

        return $this;
    }

    /**
     * @param string $identifier
     * @param string $boolean
     *
     * @return $this
     */
    public function addBoolean(string $identifier, string $boolean): self
    {
        if (!$this->boolean) {
            $this->boolean = [];
        }

        $this->boolean[$identifier] = $boolean;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getColors(): ?array
    {
        return $this->colors;
    }

    /**
     * @param string[]|null $colors
     *
     * @return $this
     */
    public function setColors(?array $colors): self
    {
        $this->colors = $colors;

        return $this;
    }

    /**
     * @param string $identifier
     * @param string $color
     *
     * @return $this
     */
    public function addColor(string $identifier, string $color): self
    {
        if (!$this->colors) {
            $this->colors = [];
        }

        $this->colors[$identifier] = $color;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getDimensions(): ?array
    {
        return $this->dimensions;
    }

    /**
     * @param string[]|null $dimensions
     *
     * @return $this
     */
    public function setDimensions(?array $dimensions): self
    {
        $this->dimensions = $dimensions;

        return $this;
    }

    /**
     * @param string $identifier
     * @param string $dimension
     *
     * @return $this
     */
    public function addDimension(string $identifier, string $dimension): self
    {
        if (!$this->dimensions) {
            $this->dimensions = [];
        }

        $this->dimensions[$identifier] = $dimension;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getStrings(): ?array
    {
        return $this->strings;
    }

    /**
     * @param string[]|null $strings
     *
     * @return $this
     */
    public function setStrings(?array $strings): self
    {
        $this->strings = $strings;

        return $this;
    }

    /**
     * @param string $identifier
     * @param string $string
     *
     * @return $this
     */
    public function addString(string $identifier, string $string): self
    {
        if (!$this->strings) {
            $this->strings = [];
        }

        $this->strings[$identifier] = $string;

        return $this;
    }
}
