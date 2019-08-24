<?php

namespace DaDaDev\AmazonAlexa\RequestHandling;

use DaDaDev\AmazonAlexa\Request;

interface RequestHandlerInterface
{
    /**
     * @return string
     */
    public function getRequestType(): string;

    /**
     * @param Request $alexaRequest
     *
     * @return bool
     */
    public function canFulfilRequestedRequestType(Request $alexaRequest): bool;

    /**
     * @param Request $alexaRequest
     *
     * @return mixed
     */
    public function handleRequest(Request $alexaRequest);
}
