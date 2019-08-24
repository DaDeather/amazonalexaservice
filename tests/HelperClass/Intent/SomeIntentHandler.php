<?php

namespace DaDaDev\AmazonAlexaTests\HelperClass\Intent;

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\RequestHandling\AbstractIntentHandler;
use DaDaDev\AmazonAlexa\Response;
use DaDaDev\AmazonAlexa\Responses\OutputSpeech;

class SomeIntentHandler extends AbstractIntentHandler
{
    /** @var AmazonAlexaService */
    private $amazonAlexaService;

    public function __construct(AmazonAlexaService $amazonAlexaService)
    {
        $this->amazonAlexaService = $amazonAlexaService;
    }

    public function getIntentName(): string
    {
        return 'someIntent';
    }

    public function handleIntent(Request $request): ?Response
    {
        return $this->amazonAlexaService->createOutputSpeechResponse(
            OutputSpeech::TYPE_PLAINTEXT,
            'Hello World!',
            true
        );
    }
}
