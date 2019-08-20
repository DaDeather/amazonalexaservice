<?php

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use DaDaDev\AmazonAlexa\Exceptions\ValidationException;
use DaDaDev\AmazonAlexa\Request;
use DaDaDev\AmazonAlexa\Response;
use JMS\Serializer\SerializerBuilder;

$serializer = SerializerBuilder::create()->build();
$amazonAlexaService = new AmazonAlexaService('YOUR APP ID HERE', $serializer);

$jsonRequest = file_get_contents('php://input');
$request = $amazonAlexaService->getAlexaRequest($jsonRequest);

try {
    $amazonAlexaService->validateIncomingRequest(
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

$response = $amazonAlexaService->handleIntentsThroughConfiguration($request, [
    'AnyIntentName' => function (Request $alexaRequest) {
        // ... do what ever you want for the intent

        // Return a or anything else you want to process further
        $response = new Response();

        return $response;
    },
]);

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
