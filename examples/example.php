<?php

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use DaDaDev\AmazonAlexa\Exceptions\ValidationException;
use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\RequestHandling\AbstractIntentHandler;
use DaDaDev\AmazonAlexa\Response;
use DaDaDev\AmazonAlexa\Responses\OutputSpeech;
use DaDaDev\AmazonAlexa\Service\RequestValidationService;
use JMS\Serializer\SerializerBuilder;

class SampleIntentHandler extends AbstractIntentHandler
{
    /** @var AmazonAlexaService */
    private $amazonAlexaService;

    public function __construct(AmazonAlexaService $amazonAlexaService)
    {
        $this->amazonAlexaService = $amazonAlexaService;
    }

    public function getIntentName(): string
    {
        return 'myIntent';
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

$serializer = SerializerBuilder::create()->build();
$requestValidationService = new RequestValidationService();
$amazonAlexaService = new AmazonAlexaService($serializer);

$jsonRequest = file_get_contents('php://input');
$request = $amazonAlexaService->getAlexaRequest($jsonRequest);

try {
    $requestValidationService->validateIncomingRequest(
        'YOUR APP ID HERE',
        $_SERVER['HTTP_SIGNATURECERTCHAINURL'],
        $_SERVER['HTTP_SIGNATURE'],
        $jsonRequest,
        $request
    );
} catch (\Exception | ValidationException $exception) {
    http_response_code(404);
    exit(json_encode([
        'status' => 'failed',
        'message' => $exception->getMessage(),
        'code' => $exception->getCode(),
    ]));
}

$response = $amazonAlexaService->handleIntents($request, new SampleIntentHandler($amazonAlexaService));

if ($response) {
    header('Content-Type: application/json');
    echo $amazonAlexaService->createJsonFromResponse($response);
    exit();
}

http_response_code(404);
exit(json_encode([
    'status' => 'failed',
    'message' => 'Request was not handled, or returned empty reponse.',
    'code' => '404',
]));
