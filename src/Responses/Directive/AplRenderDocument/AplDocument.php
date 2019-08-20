<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument;

use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplImport;
use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplMainTemplate;
use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplResource;
use DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplStyle;
use JMS\Serializer\Annotation as JMS;

class AplDocument
{
    public const THEME_DARK = 'dark';
    public const THEME_LIGHT = 'light';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type = 'APL';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("version")
     */
    protected $version = '1.1';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("description")
     */
    protected $description;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("theme")
     */
    protected $theme = 'dark';

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("settings")
     */
    protected $settings;

    /**
     * @var AplResource[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplResource>")
     * @JMS\SerializedName("resources")
     */
    protected $resources;

    /**
     * @var AplStyle[]|null
     * @JMS\Type("array<string, DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplStyle>")
     * @JMS\SerializedName("styles")
     */
    protected $styles;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("layouts")
     */
    protected $layouts;

    /**
     * @var AplImport[]|null
     * @JMS\Type("array<App\Utils\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplImport>")
     * @JMS\SerializedName("import")
     */
    protected $import;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("graphics")
     */
    protected $graphics;

    /**
     * @var AplMainTemplate|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Directive\AplRenderDocument\DocumentElement\AplMainTemplate")
     * @JMS\SerializedName("mainTemplate")
     */
    protected $mainTemplate;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("commands")
     */
    protected $commands;

    /**
     * @var array|null
     * @JMS\Type("array")
     * @JMS\SerializedName("onMount")
     */
    protected $onMount;

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
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * @param string $version
     *
     * @return $this
     */
    public function setVersion(string $version): self
    {
        $this->version = $version;

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

    /**
     * @return string[]|null
     */
    public function getSettings(): ?array
    {
        return $this->settings;
    }

    /**
     * @param string[]|null $settings
     *
     * @return $this
     */
    public function setSettings(?array $settings): self
    {
        $this->settings = $settings;

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
     * @return AplStyle[]|null
     */
    public function getStyles(): ?array
    {
        return $this->styles;
    }

    /**
     * @param AplStyle[]|null $styles
     *
     * @return $this
     */
    public function setStyles(?array $styles): self
    {
        $this->styles = $styles;

        return $this;
    }

    /**
     * @param AplStyle $aplStyle
     *
     * @return $this
     */
    public function addStyle(AplStyle $aplStyle): self
    {
        if (!$this->styles) {
            $this->styles = [];
        }

        $this->styles[] = $aplStyle;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getLayouts(): ?array
    {
        return $this->layouts;
    }

    /**
     * @param array|null $layouts
     *
     * @return $this
     */
    public function setLayouts(?array $layouts): self
    {
        $this->layouts = $layouts;

        return $this;
    }

    /**
     * @param string      $identifier
     * @param array       $items
     * @param array|null  $parameters
     * @param string|null $description
     *
     * @return $this
     */
    public function addLayout(string $identifier, array $items, ?array $parameters = null, ?string $description = null): self
    {
        if (!$this->layouts) {
            $this->layouts = [];
        }

        $this->layouts[$identifier]['items'] = $items;

        if ($parameters) {
            $this->layouts[$identifier]['parameters'] = $parameters;
        }

        if ($description) {
            $this->layouts[$identifier]['description'] = $description;
        }

        return $this;
    }

    /**
     * @return AplImport[]|null
     */
    public function getImport(): ?array
    {
        return $this->import;
    }

    /**
     * @param AplImport[]|null $import
     *
     * @return $this
     */
    public function setImport(?array $import): self
    {
        $this->import = $import;

        return $this;
    }

    /**
     * @param AplImport $aplImport
     *
     * @return $this
     */
    public function addImport(AplImport $aplImport): self
    {
        if (!$this->import) {
            $this->import = [];
        }

        $this->import[] = $aplImport;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getGraphics(): ?array
    {
        return $this->graphics;
    }

    /**
     * @param array|null $graphics
     *
     * @return $this
     */
    public function setGraphics(?array $graphics): self
    {
        $this->graphics = $graphics;

        return $this;
    }

    /**
     * @return AplMainTemplate|null
     */
    public function getMainTemplate(): ?AplMainTemplate
    {
        return $this->mainTemplate;
    }

    /**
     * @param AplMainTemplate|null $mainTemplate
     *
     * @return $this
     */
    public function setMainTemplate(?AplMainTemplate $mainTemplate): self
    {
        $this->mainTemplate = $mainTemplate;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getCommands(): ?array
    {
        return $this->commands;
    }

    /**
     * @param array|null $commands
     *
     * @return $this
     */
    public function setCommands(?array $commands): self
    {
        $this->commands = $commands;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getOnMount(): ?array
    {
        return $this->onMount;
    }

    /**
     * @param array|null $onMount
     *
     * @return $this
     */
    public function setOnMount(?array $onMount): self
    {
        $this->onMount = $onMount;

        return $this;
    }
}
