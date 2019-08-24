<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive;

use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\AplDocument;
use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DataSource;
use JMS\Serializer\Annotation as JMS;

class AplRenderDocumentDirective extends AbstractDirective
{
    /**
     * @var AplDocument|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\AplDocument")
     * @JMS\SerializedName("document")
     */
    protected $document;

    /**
     * @var DataSource[]|null
     * @JMS\Type("array<string, DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DataSource>")
     * @JMS\SerializedName("datasources")
     */
    protected $dataSources;

    public function __construct()
    {
        $this->setType(self::TYPE_APL_RENDER_DOCUMENT);
    }

    /**
     * @return AplDocument|null
     */
    public function getDocument(): ?AplDocument
    {
        return $this->document;
    }

    /**
     * @param AplDocument|null $document
     *
     * @return $this
     */
    public function setDocument(?AplDocument $document): self
    {
        $this->document = $document;

        return $this;
    }

    /**
     * @return DataSource[]|null
     */
    public function getDataSources(): ?array
    {
        return $this->dataSources;
    }

    /**
     * @param DataSource[]|null $dataSources
     *
     * @return $this
     */
    public function setDataSources(?array $dataSources): self
    {
        $this->dataSources = $dataSources;

        return $this;
    }

    /**
     * @param string     $identifier
     * @param DataSource $dataSource
     *
     * @return $this
     */
    public function addDataSources(string $identifier, DataSource $dataSource): self
    {
        if (!$this->dataSources) {
            $this->dataSources = [];
        }

        $this->dataSources[$identifier] = $dataSource;

        return $this;
    }
}
