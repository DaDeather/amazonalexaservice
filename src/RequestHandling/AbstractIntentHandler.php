<?php

namespace DaDaDev\AmazonAlexa\RequestHandling;

use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\Requests\AbstractRequest;

abstract class AbstractIntentHandler implements IntentHandlerInterface
{
    /**
     * @return string
     */
    private function getRequestType(): string
    {
        return AbstractRequest::TYPE_INTENT_REQUEST;
    }

    /**
     * @param Request $alexaRequest
     *
     * @return bool
     */
    public function canFulfilRequestedIntent(Request $alexaRequest): bool
    {
        if ($this->getRequestType() !== $alexaRequest->getRequestType()) {
            return false;
        }

        if ($this->getIntentName() !== $alexaRequest->getIntent()) {
            return false;
        }

        return true;
    }
}
