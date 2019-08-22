<?php

namespace DaDaDev\AmazonAlexa;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;
use DaDaDev\AmazonAlexa\Requests\Context;
use DaDaDev\AmazonAlexa\Requests\NullContext;
use DaDaDev\AmazonAlexa\Requests\NullSession;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\IntentRequest;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\NullRequest;
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
     * @var Session
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Session")
     */
    protected $session;

    /**
     * @var Context
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\Context")
     */
    protected $context;

    /**
     * @var AbstractRequest
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
     * @return Session
     */
    public function getSession(): Session
    {
        return $this->session ?? new NullSession();
    }

    /**
     * @return Context
     */
    public function getContext(): Context
    {
        return $this->context ?? new NullContext();
    }

    /**
     * @return AbstractRequest
     */
    public function getRequest(): AbstractRequest
    {
        return $this->request ?? new NullRequest();
    }

    /**
     * @return array
     */
    public function getSessionVariables(): array
    {
        $alexaSession = $this->getSession();
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

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return $this->getRequest()->getType();
    }

    /**
     * @return string|null
     */
    public function getIntent(): ?string
    {
        $alexaRequestData = $this->getRequest();
        if ($alexaRequestData instanceof IntentRequest) {
            return $alexaRequestData->getIntent()->getName();
        }

        return null;
    }
}
