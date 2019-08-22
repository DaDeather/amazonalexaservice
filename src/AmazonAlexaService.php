<?php

namespace DaDaDev\AmazonAlexa;

use DaDaDev\AmazonAlexa\Exceptions\ParseRequestException;
use DaDaDev\AmazonAlexa\Exceptions\ValidationException;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\LaunchRequest;
use DaDaDev\AmazonAlexa\Responses\OutputSpeech;
use JMS\Serializer\SerializerInterface;

class AmazonAlexaService
{
    private const AMAZON_SUBJECT_ALTERNATIVE_NAME = 'echo-api.amazon.com';
    private const AMAZON_ALEXA_SKILL_VALIDATION_HOST = 's3.amazonaws.com';
    private const AMAZON_ALEXA_SKILL_VALIDATION_SCHEME = 'https';
    private const AMAZON_ALEXA_SKILL_VALIDATION_PATH = '/echo.api/';

    /** @var string */
    private $alexaSkillAppId;

    /** @var SerializerInterface */
    private $serializer;

    /**
     * @param string              $alexaSkillAppId
     * @param SerializerInterface $serializer
     *
     * @throws \Exception
     */
    public function __construct(string $alexaSkillAppId, SerializerInterface $serializer)
    {
        if (!$alexaSkillAppId || !trim($alexaSkillAppId)) {
            throw new \Exception('Please provide a valid alexa skill app id.', 1544878800);
        }

        $this->alexaSkillAppId = $alexaSkillAppId;
        $this->serializer = $serializer;
    }

    /**
     * @param string  $signatureCertChainUrl
     * @param string  $signature
     * @param string  $rawJsonRequest
     * @param Request $alexaRequest
     *
     * @return bool Returns true or throws an exception on fail
     *
     * @throws ValidationException
     */
    public function validateIncomingRequest(
        ?string $signatureCertChainUrl,
        ?string $signature,
        string $rawJsonRequest,
        Request $alexaRequest
    ): bool {
        if (!$signatureCertChainUrl || !$signature) {
            throw new ValidationException('Missing signaturecertchainurl or signature header.', 1513627426);
        }

        try {
            $this->validateRequestingIp();
            $this->validateMethod();
            $this->validateApplicationId($alexaRequest);
            $this->validateSignatureUrl($signatureCertChainUrl);
            $this->validateSignature($signatureCertChainUrl, $signature, $rawJsonRequest);
            $this->validateRequestTimestamp($alexaRequest);
        } catch (\Throwable $throwable) {
            if ($throwable instanceof ValidationException) {
                throw $throwable;
            }

            throw new ValidationException(
                sprintf('Validation failed due to: %s', $throwable->getMessage()),
                1566292857682,
                $throwable
            );
        }

        return true;
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
        string $speechType,
        string $message,
        bool $shouldEndSession = false
    ): Response {
        $outputSpeech = (new OutputSpeech())
            ->setType($speechType);

        if (OutputSpeech::TYPE_PLAINTEXT === $speechType) {
            $outputSpeech->setText($message);
        } else {
            $outputSpeech->setSsml($message);
        }

        $alexaResponse = new Response();
        $alexaResponse->setResponse(
            (new Responses\Response())
                ->setOutputSpeech($outputSpeech)
                ->setShouldEndSession($shouldEndSession)
        );

        return $alexaResponse;
    }

    /**
     * @param Request  $alexaRequest
     * @param string   $intentName
     * @param callable $callback     The callback gets passed the $alexaRequest Parameter
     *
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleIntentRequest(Request $alexaRequest, string $intentName, callable $callback)
    {
        if (LaunchRequest::TYPE_INTENT_REQUEST !== $alexaRequest->getRequestType()) {
            return null;
        }

        if ($alexaRequest->getIntent() !== $intentName) {
            return null;
        }

        return $callback($alexaRequest);
    }

    /**
     * @param Request $alexaRequest
     * @param array   $intentConfiguration An array with the structure <key = string, value = callable>
     *
     * @return mixed|null
     */
    public function handleIntentsThroughConfiguration(Request $alexaRequest, array $intentConfiguration = [])
    {
        foreach ($intentConfiguration as $intentName => $intentCallback) {
            $intentResponse = $this->handleIntentRequest($alexaRequest, $intentName, $intentCallback);
            if ($intentResponse) {
                return $intentResponse;
            }
        }

        return null;
    }

    /**
     * @param Request  $alexaRequest
     * @param callable $callback     The callback gets passed the $alexaRequest Parameter
     *
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleLaunchRequest(Request $alexaRequest, callable $callback)
    {
        if (LaunchRequest::TYPE_LAUNCH_REQUEST !== $alexaRequest->getRequestType()) {
            return null;
        }

        return $callback($alexaRequest);
    }

    /**
     * @param Request  $alexaRequest
     * @param callable $callback     The callback gets passed the $alexaRequest Parameter
     *
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleAplUserEventRequest(Request $alexaRequest, callable $callback)
    {
        if (LaunchRequest::TYPE_APL_USER_EVENT_REQUEST !== $alexaRequest->getRequestType()) {
            return null;
        }

        return $callback($alexaRequest);
    }

    /**
     * @param Request  $alexaRequest
     * @param callable $callback     The callback gets passed the $alexaRequest Parameter
     *
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleSessionEndRequest(Request $alexaRequest, callable $callback)
    {
        if (LaunchRequest::TYPE_SESSION_ENDED_REQUEST !== $alexaRequest->getRequestType()) {
            return null;
        }

        return $callback($alexaRequest);
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

    /**
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateRequestingIp(): bool
    {
        if (!filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE)) {
            throw new ValidationException('Request source IP address is not allowed.', 1513625848);
        }

        return true;
    }

    /**
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateMethod(): bool
    {
        if ('GET' === $_SERVER['REQUEST_METHOD']) {
            throw new ValidationException('HTTP GET when POST was expected.', 1513625947);
        }

        return true;
    }

    /**
     * @param Request $alexaRequest
     *
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateApplicationId(Request $alexaRequest): bool
    {
        if ($alexaRequest->getContext()->getSystem()->getApplication()->getApplicationId() !== $this->alexaSkillAppId) {
            throw new ValidationException('Wrong application ID.', 1513625947);
        }

        return true;
    }

    /**
     * @param Request $alexaRequest
     *
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateRequestTimestamp(Request $alexaRequest): bool
    {
        if (null === $alexaRequest->getRequest()->getTimestamp()) {
            throw new ValidationException('Missing timestamp.', 1513627010);
        }

        $alexaTimestamp = $alexaRequest->getRequest()->getTimestamp();
        if ((time() - $alexaTimestamp->getTimestamp()) > 60) {
            throw new ValidationException('Request is older than 60 seconds.', 1513627168);
        }

        return true;
    }

    /**
     * @param string $signatureUrl
     *
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateSignatureUrl(string $signatureUrl): bool
    {
        $urlParts = parse_url($signatureUrl);

        if (self::AMAZON_ALEXA_SKILL_VALIDATION_SCHEME !== $urlParts['scheme']
            || self::AMAZON_ALEXA_SKILL_VALIDATION_HOST !== $urlParts['host']
            || (array_key_exists('port', $urlParts) && 443 !== $urlParts['port'])
            || 0 !== strpos($urlParts['path'], self::AMAZON_ALEXA_SKILL_VALIDATION_PATH)
        ) {
            throw new ValidationException('Wrong signature url.', 1513625947);
        }

        return true;
    }

    /**
     * @param string $signatureCertChainUrl
     * @param string $signature
     * @param string $rawJson
     *
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateSignature(
        string $signatureCertChainUrl,
        string $signature,
        string $rawJson
    ): bool {
        $signatureCertificationFile = file_get_contents($signatureCertChainUrl);
        $sslCheck = openssl_verify($rawJson, (string) base64_decode($signature), (string) $signatureCertificationFile);
        if (1 !== $sslCheck) {
            throw new ValidationException(openssl_error_string() . 1513626524);
        }

        $parsedCertificate = openssl_x509_parse((string) $signatureCertificationFile);
        if (!$parsedCertificate) {
            throw new ValidationException('OpenSSL x509 parsing failed.' . 1513626541);
        }

        if (false === strpos($parsedCertificate['extensions']['subjectAltName'], self::AMAZON_SUBJECT_ALTERNATIVE_NAME)) {
            throw new ValidationException('OpenSSL x509 parsing failed.' . 1513626691);
        }

        $time = time();
        if (!($parsedCertificate['validFrom_time_t'] <= $time && $time <= $parsedCertificate['validTo_time_t'])) {
            throw new ValidationException('Certification expire check failed.' . 1513626803);
        }

        return true;
    }
}
