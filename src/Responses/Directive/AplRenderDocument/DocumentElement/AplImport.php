<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement;

use JMS\Serializer\Annotation as JMS;

class AplImport
{
    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("name")
     */
    protected $name;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("version")
     */
    protected $version;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("source")
     */
    protected $source;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return $this
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param string|null $version
     *
     * @return $this
     */
    public function setVersion(?string $version): self
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getSource(): ?string
    {
        return $this->source;
    }

    /**
     * @param string|null $source
     *
     * @return $this
     */
    public function setSource(?string $source): self
    {
        $this->source = $source;

        return $this;
    }
}
