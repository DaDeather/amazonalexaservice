<?php

namespace DaDaDev\AmazonAlexa;

use JMS\Serializer\Annotation as JMS;

class Response
{
    /**
     * @var string|null
     * @JMS\Type("string")
     */
    protected $version = '1.0';

    /**
     * @var array|null
     * @JMS\Type("array<string, string>")
     */
    protected $sessionAttributes;

    /**
     * @var Responses\Response|null
     * @JMS\Type("DaDaDev\AmazonAlexa\Responses\Response")
     */
    protected $response;

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
     * @return Response
     */
    public function setVersion(?string $version): Response
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return array|null
     */
    public function getSessionAttributes(): ?array
    {
        return $this->sessionAttributes;
    }

    /**
     * @param array $sessionAttributes
     *
     * @return Response
     */
    public function setSessionAttributes(array $sessionAttributes = []): Response
    {
        $this->sessionAttributes = $sessionAttributes;

        return $this;
    }

    /**
     * @param string $key
     * @param mixed  $value
     *
     * @return Response
     */
    public function addSessionAttribute(string $key, $value): Response
    {
        if (!$this->sessionAttributes) {
            $this->sessionAttributes = [];
        }

        $this->sessionAttributes[$key] = $value;

        return $this;
    }

    /**
     * @return Responses\Response|null
     */
    public function getResponse(): ?Responses\Response
    {
        return $this->response;
    }

    /**
     * @param Responses\Response|null $response
     *
     * @return Response
     */
    public function setResponse(?Responses\Response $response): Response
    {
        $this->response = $response;

        return $this;
    }
}
