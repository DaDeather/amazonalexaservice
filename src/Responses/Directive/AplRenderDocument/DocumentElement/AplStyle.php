<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement;

use JMS\Serializer\Annotation as JMS;

class AplStyle
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
     * @JMS\SerializedName("extend")
     */
    protected $extend;

    /**
     * @var string[][]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("values")
     */
    protected $values;

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
    public function getExtend(): ?string
    {
        return $this->extend;
    }

    /**
     * @param string|null $extend
     *
     * @return $this
     */
    public function setExtend(?string $extend): self
    {
        $this->extend = $extend;

        return $this;
    }

    /**
     * @return string[][]|null
     */
    public function getValues(): ?array
    {
        return $this->values;
    }

    /**
     * @param string[][]|null $values
     *
     * @return $this
     */
    public function setValues(?array $values): self
    {
        $this->values = $values;

        return $this;
    }

    /**
     * @param string $identifier
     * @param string $value
     * @param int    $valuesIndex
     *
     * @return $this
     */
    public function addValue(string $identifier, string $value, int $valuesIndex = 0): self
    {
        if (!$this->values) {
            $this->values = [];
        }

        if (!isset($this->values[$valuesIndex])) {
            $this->values[$valuesIndex] = [];
        }

        $this->values[$valuesIndex][$identifier] = $value;

        return $this;
    }

    /**
     * @param string $when
     * @param int    $valuesIndex
     *
     * @return $this
     */
    public function addWhen(string $when, int $valuesIndex = 0): self
    {
        if (!$this->values) {
            $this->values = [];
        }

        if (!isset($this->values[$valuesIndex])) {
            $this->values[$valuesIndex] = [];
        }

        $this->values[$valuesIndex]['when'] = $when;

        return $this;
    }
}
