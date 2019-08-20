<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument;

use JMS\Serializer\Annotation as JMS;

class DataSource
{
    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'object';

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("properties")
     */
    protected $properties;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("objectID")
     */
    protected $objectId;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    protected $description;

    /**
     * @var DataSourceTransformer[]|null
     * @JMS\Type("array<App\Utils\AmazonAlexa\Responses\Directive\AplRenderDocument\DataSourceTransformer>")
     * @JMS\SerializedName("transformers")
     */
    protected $transformers;

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     *
     * @return $this
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getProperties(): ?array
    {
        return $this->properties;
    }

    /**
     * @param string[]|null $properties
     *
     * @return $this
     */
    public function setProperties(?array $properties): self
    {
        $this->properties = $properties;

        return $this;
    }

    /**
     * @param string $identifier
     * @param string $value
     *
     * @return $this
     */
    public function addProperty(string $identifier, string $value): self
    {
        if (!$this->properties) {
            $this->properties = [];
        }

        $this->properties[$identifier] = $value;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getObjectId(): ?string
    {
        return $this->objectId;
    }

    /**
     * @param string|null $objectId
     *
     * @return $this
     */
    public function setObjectId(?string $objectId): self
    {
        $this->objectId = $objectId;

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
     * @return DataSourceTransformer[]|null
     */
    public function getTransformers(): ?array
    {
        return $this->transformers;
    }

    /**
     * @param DataSourceTransformer[]|null $transformers
     *
     * @return $this
     */
    public function setTransformers(?array $transformers): self
    {
        $this->transformers = $transformers;

        return $this;
    }

    /**
     * @param DataSourceTransformer $dataSourceTransformer
     *
     * @return $this
     */
    public function addTransformer(DataSourceTransformer $dataSourceTransformer): self
    {
        if (!$this->transformers) {
            $this->transformers = [];
        }

        $this->transformers[] = $dataSourceTransformer;

        return $this;
    }
}
