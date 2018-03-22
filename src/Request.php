<?php

namespace DaDaDev\AmazonAlexa;

use DaDaDev\AmazonAlexa\Requests\Context;
use DaDaDev\AmazonAlexa\Requests\LaunchRequest;
use DaDaDev\AmazonAlexa\Requests\Session;
use DaDaDev\AmazonAlexa\Requests\SessionEndedRequest;
use JMS\Serializer\Annotation as JMS;

/**
 * Class Request
 */
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
     * @var SessionEndedRequest|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Requests\SessionEndedRequest")
     */
    protected $request;

    /**
     * @return null|string
     */
    public function getVersion(): ?string
    {
        return $this->version;
    }

    /**
     * @param null|string $version
     * @return Request
     */
    public function setVersion(?string $version): Request
    {
        $this->version = $version;
        return $this;
    }

    /**
     * @return Session|null
     */
    public function getSession(): ?Session
    {
        return $this->session;
    }

    /**
     * @param Session|null $session
     * @return Request
     */
    public function setSession(?Session $session): Request
    {
        $this->session = $session;
        return $this;
    }

    /**
     * @return Context|null
     */
    public function getContext(): ?Context
    {
        return $this->context;
    }

    /**
     * @param Context|null $context
     * @return Request
     */
    public function setContext(?Context $context): Request
    {
        $this->context = $context;
        return $this;
    }

    /**
     * @return SessionEndedRequest|null
     */
    public function getRequest(): ?SessionEndedRequest
    {
        return $this->request;
    }

    /**
     * @param LaunchRequest|null $request
     * @return Request
     */
    public function setRequest(?LaunchRequest $request): Request
    {
        $this->request = $request;
        return $this;
    }
}