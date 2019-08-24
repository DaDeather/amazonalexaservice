<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive;

use DaDaDev\AmazonAlexa\Responses\Directive\AplExecuteCommand\AplCommand;
use JMS\Serializer\Annotation as JMS;

class AplExecuteCommandsDirective extends AbstractDirective
{
    /**
     * @var AplCommand[]|null
     * @JMS\Type("array<DaDaDev\AmazonAlexa\Responses\Directive\AplExecuteCommand\AplCommand>")
     * @JMS\SerializedName("commands")
     */
    protected $commands;

    public function __construct()
    {
        $this->setType(self::TYPE_APL_EXECUTE_COMMANDS);
    }

    /**
     * @return AplCommand[]|null
     */
    public function getCommands(): ?array
    {
        return $this->commands;
    }

    /**
     * @param AplCommand[]|null $commands
     *
     * @return $this
     */
    public function setCommands(?array $commands): self
    {
        $this->commands = $commands;

        return $this;
    }
}
