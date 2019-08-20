<?php

namespace DaDaDev\AmazonAlexa;

use DaDaDev\AmazonAlexa\Requests\Context;
use DaDaDev\AmazonAlexa\Requests\AbstractRequest;
use DaDaDev\AmazonAlexa\Requests\IntentRequest;
use DaDaDev\AmazonAlexa\Requests\Session;
use JMS\Serializer\Annotation as JMS;

class Request
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $version;

    /**
     * @var Session|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Session")
     */
    protected $session;

    /**
     * @var Context|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Context")
     */
    protected $context;

    /**
     * @var AbstractRequest|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\AbstractRequest")
     */
    protected $request;

    /**
     * @return string|null
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @return Session|null
     */
    public function getSession(): ?Session
    {
        return $this->session;
    }

    /**
     * @return Context|null
     */
    public function getContext(): ?Context
    {
        return $this->context;
    }

    /**
     * @return AbstractRequest|null
     */
    public function getRequest(): ?AbstractRequest
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getSessionVariables(): array
    {
        $alexaSession = $this->getSession();
        if (!$alexaSession) {
            return [];
        }

        if (!($attributes = $alexaSession->getAttributes())) {
            return [];
        }

        return $attributes;
    }

    /**
     * @param string     $name
     * @param mixed|null $defaultValue
     *
     * @return mixed|null
     */
    public function getSessionVariable(string $name, $defaultValue = null)
    {
        $session = $this->getSessionVariables();

        if (empty($session) || !isset($session[$name])) {
            return $defaultValue;
        }

        return $session[$name] ?? $defaultValue;
    }

    /**#@-
     * @return null|string
     */
    public function getRequestType(): ?string
    {
        $alexaRequestData = $this->getRequest();
        if ($alexaRequestData) {
            return $alexaRequestData->getType();
        }

        return null;
    }

    /**#@-
     * @return null|string
     */
    public function getIntent(): ?string
    {
        $alexaRequestData = $this->getRequest();

        if ($alexaRequestData && $alexaRequestData instanceof IntentRequest) {
            $requestedIntent = $alexaRequestData->getIntent();

            if ($requestedIntent) {
                return $requestedIntent->getName();
            }
        }

        return null;
    }
}
