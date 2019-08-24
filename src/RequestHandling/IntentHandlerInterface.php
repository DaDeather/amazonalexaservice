<?php

namespace DaDaDev\AmazonAlexa\RequestHandling;

use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\Response;

interface IntentHandlerInterface
{
    /**
     * @return string
     */
    public function getIntentName(): string;

    /**
     * @param Request $alexaRequest
     *
     * @return bool
     */
    public function canFulfilRequestedIntent(Request $alexaRequest): bool;

    /**
     * @param Request $alexaRequest
     *
     * @return Response|null
     */
    public function handleIntent(Request $alexaRequest): ?Response;
}
