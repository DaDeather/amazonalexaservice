<?php

namespace DaDaDev\AmazonAlexa\Responses\Directive;

use JMS\Serializer\Annotation as JMS;

abstract class AbstractDirective
{
    public const TYPE_APL_RENDER_DOCUMENT = 'Alexa.Presentation.APL.RenderDocument';
    public const TYPE_APL_EXECUTE_COMMANDS = 'Alexa.Presentation.APL.ExecuteCommands';
    public const TYPE_DIALOG_DELEGATE = 'Dialog.Delegate';

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("type")
     */
    protected $type;

    /**
     * @var string|null
     * @JMS\Type("string")
     * @JMS\SerializedName("token")
     */
    protected $token;

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     *
     * @return $this
     */
    protected function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @param string|null $token
     *
     * @return $this
     */
    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }
}
