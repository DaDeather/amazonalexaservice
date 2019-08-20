<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\AplUserEventElements\EventSource;
use JMS\Serializer\Annotation as JMS;

class AplUserEventRequest extends AbstractRequest
{
    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("arguments")
     */
    protected $arguments;

    /**
     * @var string[]|null
     * @JMS\Type("array")
     * @JMS\SerializedName("components")
     */
    protected $components;

    /**
     * @var EventSource|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\RequestTypes\AplUserEventElements\EventSource")
     * @JMS\SerializedName("source")
     */
    protected $source;

    /**
     * @return string[]|null
     */
    public function getArguments(): ?array
    {
        return $this->arguments;
    }

    /**
     * @return string[]|null
     */
    public function getComponents(): ?array
    {
        return $this->components;
    }

    /**
     * @param string $componentKey
     *
     * @return mixed|null
     */
    public function getComponentValueByKey(string $componentKey)
    {
        return $this->components[$componentKey] ?? null;
    }

    /**
     * @return EventSource|null
     */
    public function getSource(): ?EventSource
    {
        return $this->source;
    }
}
