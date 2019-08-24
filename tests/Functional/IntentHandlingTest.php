<?php

namespace DaDaDev\AmazonAlexaTests\Functional;

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use DaDaDev\AmazonAlexa\Exceptions\ValidationException;
use DaDaDev\AmazonAlexa\Service\RequestValidationService;
use DaDaDev\AmazonAlexaTests\HelperClass\Intent\SomeIntentHandler;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class IntentHandlingTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp()
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->serializer = SerializerBuilder::create()
            ->build();
    }

    public function testExampleRunHandledIntent(): void
    {
        self::assertSame(
            '{"version":"1.0","response":{"outputSpeech":{"type":"PlainText","text":"Hello World!"},"shouldEndSession":true}}',
            $this->runForFixture('some_intent_request.json')
        );
    }

    public function testExampleRunNotHandledIntent(): void
    {
        self::assertSame(
            '{"status":"failed","message":"Request was not handled, or returned empty reponse.","code":"404"}',
            $this->runForFixture('some_other_intent_request.json')
        );
    }

    private function runForFixture(string $jsonFixture): string
    {
        $amazonAlexaService = new AmazonAlexaService($this->serializer);
        $requestValidationServiceMock = $this->createMock(RequestValidationService::class);

        $jsonRequest = file_get_contents(__DIR__ . '/Fixtures/' . $jsonFixture);
        $request = $amazonAlexaService->getAlexaRequest($jsonRequest);

        try {
            $requestValidationServiceMock->validateIncomingRequest(
                'someAppId',
                'someSignatureCertChainUrl',
                'someSignature',
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

        $response = $amazonAlexaService->handleIntents($request, new SomeIntentHandler($amazonAlexaService));

        if ($response) {
            return $amazonAlexaService->createJsonFromResponse($response);
        }

        return json_encode([
            'status' => 'failed',
            'message' => 'Request was not handled, or returned empty reponse.',
            'code' => '404',
        ]);
    }
}
