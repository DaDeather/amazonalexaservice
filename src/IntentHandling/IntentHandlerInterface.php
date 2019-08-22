<?php

namespace DaDaDev\AmazonAlexa\IntentHandling;

use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\Response;

interface IntentHandlerInterface
{
    public const INTEND_AMAZON_REPEAT = 'AMAZON.RepeatIntent';
    public const INTEND_AMAZON_HELP = 'AMAZON.HelpIntent';
    public const INTEND_AMAZON_CANCEL = 'AMAZON.CancelIntent';
    public const INTEND_AMAZON_STOP = 'AMAZON.StopIntent';
    public const INTEND_AMAZON_NAVIGATE_HOME = 'AMAZON.NavigateHomeIntent';

    /**
     * @return string
     */
    public function getIntentName(): string;

    /**
     * @param Request $request
     *
     * @return Response|null
     */
    public function handleIntent(Request $request): ?Response;
}
