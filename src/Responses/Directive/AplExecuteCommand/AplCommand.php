<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive\AplExecuteCommand;

use JMS\Serializer\Annotation as JMS;

class AplCommand
{
    public const COMMAND_TYPE_SPEAK_ITEM = 'SpeakItem';

    /**
     * @var string
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }
}
