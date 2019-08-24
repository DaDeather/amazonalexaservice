<?php

namespace DaDaDev\AmazonAlexa;

use DaDaDev\AmazonAlexa\Exceptions\ParseRequestException;
use DaDaDev\AmazonAlexa\RequestHandling\IntentHandlerInterface;
use DaDaDev\AmazonAlexa\RequestHandling\RequestHandlerInterface;
use DaDaDev\AmazonAlexa\Responses\OutputSpeech;
use JMS\Serializer\SerializerInterface;

class AmazonAlexaService
{
    /** @var SerializerInterface */
    private $serializer;

    /**
     * @param SerializerInterface $serializer
     */
    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    /**
     * @param string $jsonString
     *
     * @return Request|null
     *
     * @throws ParseRequestException
     */
    public function getAlexaRequest(string $jsonString): ?Request
    {
        if (!$jsonString) {
            return null;
        }

        try {
            /** @var Request|null $alexaRequest */
            $alexaRequest = $this->serializer->deserialize($jsonString, Request::class, 'json');

            if (null === $alexaRequest) {
                return null;
            }

            return $alexaRequest;
        } catch (\Throwable $throwable) {
            throw new ParseRequestException(
                'Failed to parse json string into alexa object.',
                1566291190034,
                $throwable
            );
        }
    }

    /**
     * @param string $speechType       one of the TYPE_* constants in the OutputSpeech class
     * @param string $message          What should alexa say?
     * @param bool   $shouldEndSession Should the alexa session be closed?
     *
     * @return Response
     */
    public function createOutputSpeechResponse(
        string $message,
        string $speechType = OutputSpeech::TYPE_PLAINTEXT,
        bool $shouldEndSession = true
    ): Response {
        if (OutputSpeech::TYPE_PLAINTEXT !== $speechType && OutputSpeech::TYPE_SSML !== $speechType) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Given speech type "%s" is not valid. Valid types are "%s" or "%s"',
                    $speechType,
                    OutputSpeech::TYPE_PLAINTEXT,
                    OutputSpeech::TYPE_SSML
                ),
                1566655200319
            );
        }

        $outputSpeech = new OutputSpeech();
        if (OutputSpeech::TYPE_PLAINTEXT === $speechType) {
            $outputSpeech->setText($message);
        } else {
            $outputSpeech->setSsml($message);
        }

        $alexaResponse = new Response();
        $alexaResponseObject = new \DaDaDev\AmazonAlexa\Responses\Response();
        $alexaResponseObject->setOutputSpeech($outputSpeech);
        $alexaResponseObject->setShouldEndSession($shouldEndSession);

        return $alexaResponse->setResponse($alexaResponseObject);
    }

    /**
     * @param Request                $alexaRequest
     * @param IntentHandlerInterface $intentHandler
     *
     * @return Response|null returns the value returned by the handleIntend method of the intent handler if called or null
     */
    public function handleIntentRequest(Request $alexaRequest, IntentHandlerInterface $intentHandler): ?Response
    {
        if (!$intentHandler->canFulfilRequestedIntent($alexaRequest)) {
            return null;
        }

        return $intentHandler->handleIntent($alexaRequest);
    }

    /**
     * @param Request                $alexaRequest
     * @param IntentHandlerInterface ...$intentHandlers
     *
     * @return Response|null
     */
    public function handleIntents(Request $alexaRequest, IntentHandlerInterface ...$intentHandlers): ?Response
    {
        foreach ($intentHandlers as $intentHandler) {
            $intentResponse = $this->handleIntentRequest($alexaRequest, $intentHandler);
            if ($intentResponse) {
                return $intentResponse;
            }
        }

        return null;
    }

    /**
     * @param Request                 $alexaRequest
     * @param RequestHandlerInterface $requestHandler
     *
     * @return mixed|null returns the value returned by the handleRequest method of the request handler if called or null
     */
    public function handleRequest(Request $alexaRequest, RequestHandlerInterface $requestHandler)
    {
        if ($requestHandler->canFulfilRequestedRequestType($alexaRequest)) {
            return null;
        }

        return $requestHandler->handleRequest($alexaRequest);
    }

    /**
     * @param Request                 $alexaRequest
     * @param RequestHandlerInterface ...$requestHandlers
     *
     * @return mixed|null
     */
    public function handleRequests(Request $alexaRequest, RequestHandlerInterface ...$requestHandlers)
    {
        foreach ($requestHandlers as $requestHandler) {
            $requestResponse = $this->handleRequest($alexaRequest, $requestHandler);
            if ($requestResponse) {
                return $requestResponse;
            }
        }

        return null;
    }

    /**
     * @param Response $response
     *
     * @return string
     */
    public function createJsonFromResponse(Response $response): string
    {
        return $this->serializer->serialize($response, 'json');
    }
}
