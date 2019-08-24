<?php

namespace DaDaDev\AmazonAlexa\RequestHandling;

use DaDaDev\AmazonAlexa\Request;

abstract class AbstractRequestHandler implements RequestHandlerInterface
{
    public function canFulfilRequestedRequestType(Request $alexaRequest): bool
    {
        return $this->getRequestType() === $alexaRequest->getRequestType();
    }
}
