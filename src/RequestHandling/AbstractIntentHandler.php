<?php

namespace DaDaDev\AmazonAlexa\RequestHandling;

use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\Requests\AbstractRequest;

abstract class AbstractIntentHandler implements IntentHandlerInterface
{
    /**
     * @param Request $alexaRequest
     *
     * @return bool
     */
    public function canFulfilRequestedIntent(Request $alexaRequest): bool
    {
        if (!$this->isAllowedRequestType($alexaRequest->getRequestType())) {
            return false;
        }

        if (!$this->isAllowedIntentName($alexaRequest->getIntent())) {
            return false;
        }

        return true;
    }

    /**
     * @param string $requestType
     *
     * @return bool
     */
    protected function isAllowedRequestType(string $requestType): bool
    {
        return $this->getRequestType() === $requestType;
    }

    /**
     * @param string $intentName
     *
     * @return bool
     */
    protected function isAllowedIntentName(string $intentName): bool
    {
        return $this->getIntentName() === $intentName;
    }

    /**
     * @return string
     */
    private function getRequestType(): string
    {
        return AbstractRequest::TYPE_INTENT_REQUEST;
    }
}
