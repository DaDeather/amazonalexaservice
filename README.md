## AmazonAlexaService

Simple kept service for parsing and creating requests and responses for the communication between amazons webservice and your application based on amazons alexa skill capabilities. 

### Simple Usage

Creating the Service:
```
$amazonAlexaService = new \DaDaDev\AmazonAlexa\AmazonAlexaService('YOUR APP ID HERE');
```

Full Example:
```
$serializer = \JMS\Serializer\SerializerBuilder::create()->build();
$amazonAlexaService = new \DaDaDev\AmazonAlexa\AmazonAlexaService('YOUR APP ID HERE', $serializer);
 
$jsonRequest = file_get_contents('php://input');
$request = $amazonAlexaService->getAlexaRequest($jsonRequest);
 
try {
    $amazonAlexaService->validateIncomingRequest(
        $_SERVER['HTTP_SIGNATURECERTCHAINURL'],
        $_SERVER['HTTP_SIGNATURE'],
        $jsonRequest,
        $request
    );
} catch (\Exception | \DaDaDev\AmazonAlexa\Exceptions\ValidationException $exception) {
    http_response_code(404);
    exit(json_encode([
        'status' => 'failed',
        'message' => $exception->getMessage(),
        'code' => $exception->getCode(),
    ]));
}
 
$response = $amazonAlexaService->handleIntentsThroughConfiguration($request, [
    'AnyIntentName' => function (\DaDaDev\AmazonAlexa\Request $alexaRequest) {
        // ... do what ever you want for the intent
        
        // Return a or anything else you want to process further
        $response = new \DaDaDev\AmazonAlexa\Response();
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
```