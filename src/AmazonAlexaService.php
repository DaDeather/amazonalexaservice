<?php

namespace DaDaDev\AmazonAlexa;

use DaDaDev\AmazonAlexa\Exceptions\ValidationException;
use DaDaDev\AmazonAlexa\Requests\LaunchRequest;
use DaDaDev\AmazonAlexa\Responses\OutputSpeech;
use JMS\Serializer\SerializerInterface;

/**
 * Class AmazonAlexaService
 */
class AmazonAlexaService
{
    /**#@+
     * Validation information.
     *
     * @var string
     */
    private const AMAZON_SUBJECT_ALTERNATIVE_NAME = 'echo-api.amazon.com';
    private const AMAZON_ALEXA_SKILL_VALIDATION_HOST = 's3.amazonaws.com';
    private const AMAZON_ALEXA_SKILL_VALIDATION_SCHEME = 'https';
    private const AMAZON_ALEXA_SKILL_VALIDATION_PATH = '/echo.api/';
    /**#@-*/

    /**
     * @var string
     */
    private $alexaSkillAppId;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @param string $alexaSkillAppId
     * @param SerializerInterface $serializer
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
     * @param string $signatureCertChainUrl
     * @param string $signature
     * @param string $rawJsonRequest
     * @param Request $alexaRequest
     * @return bool Returns true or throws an exception on fail
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

        $this->validateRequestingIp();
        $this->validateMethod();
        $this->validateApplicationId($alexaRequest);
        $this->validateSignatureUrl($signatureCertChainUrl);
        $this->validateSignature($signatureCertChainUrl, $signature, $rawJsonRequest);
        $this->validateRequestTimestamp($alexaRequest);

        return true;
    }

    /**
     * @param string $jsonString
     * @return Request|null
     */
    public function getAlexaRequest(string $jsonString): ?Request
    {
        if (!$jsonString) {
            return null;
        }

        $alexaRequest = json_decode($jsonString, true);
        if ($alexaRequest) {
            /** @var \DaDaDev\AmazonAlexa\Request $alexaRequest */
            $alexaRequest = $this->serializer->deserialize($jsonString, Request::class, 'json');

            if (!$alexaRequest) {
                return null;
            }

            return $alexaRequest;
        }

        return null;
    }

    /**
     * @param string $speechType One of the TYPE_* constants in the OutputSpeech class.
     * @param string $message What should alexa say?
     * @param bool $shouldEndSession Should the alexa session be closed?
     * @return Response
     */
    public function createOutputSpeechResponse(
        string $speechType,
        string $message,
        bool $shouldEndSession = false
    ): Response {
        $outputSpeech = (new OutputSpeech())
            ->setType($speechType);

        if ($speechType === OutputSpeech::TYPE_PLAINTEXT) {
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
     * @param Request $alexaRequest
     * @return array
     */
    public function getSessionVariables(Request $alexaRequest): array
    {
        if (!$alexaRequest->getSession()) {
            return [];
        }

        if (!($attributes = $alexaRequest->getSession()->getAttributes())) {
            return [];
        }

        return $attributes;
    }

    /**
     * @param Request $alexaRequest
     * @param string $name
     * @param mixed|null $defaultValue
     * @return mixed|null
     */
    public function getSessionVariable(Request $alexaRequest, string $name, $defaultValue = null)
    {
        $session = $this->getSessionVariables($alexaRequest);

        if (empty($session) || !isset($session[$name])) {
            return $defaultValue;
        }

        return $session[$name] ?? $defaultValue;
    }

    /**#@-
     * @param Request $alexaRequest
     * @return null|string
     */
    public function getRequestType(Request $alexaRequest): ?string
    {
        $alexaRequestData = $alexaRequest->getRequest();
        if ($alexaRequestData) {
            $requestType = $alexaRequestData->getType();

            switch ($requestType) {
                case LaunchRequest::TYPE_LAUNCH_REQUEST:
                    return LaunchRequest::TYPE_LAUNCH_REQUEST;
                case LaunchRequest::TYPE_INTENT_REQUEST:
                    return LaunchRequest::TYPE_INTENT_REQUEST;
                case LaunchRequest::TYPE_SESSION_ENDED_REQUEST:
                    return LaunchRequest::TYPE_SESSION_ENDED_REQUEST;
            }
        }

        return null;
    }

    /**#@-
     * @param Request $alexaRequest
     * @return null|string
     */
    public function getIntent(Request $alexaRequest): ?string
    {
        $alexaRequestData = $alexaRequest->getRequest();
        if ($alexaRequestData) {
            $requestedIntent = $alexaRequestData->getIntent();

            if ($requestedIntent) {
                return $requestedIntent->getName();
            }
        }

        return null;
    }

    /**
     * @param Request $alexaRequest
     * @param string $intentName
     * @param callable $callback The callback gets passed the $alexaRequest Parameter
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleIntentRequest(Request $alexaRequest, string $intentName, callable $callback)
    {
        if ($this->getRequestType($alexaRequest) !== LaunchRequest::TYPE_INTENT_REQUEST) {
            return null;
        }

        if ($this->getIntent($alexaRequest) !== $intentName) {
            return null;
        }

        return $callback($alexaRequest);
    }

    /**
     * @param Request $alexaRequest
     * @param callable $callback The callback gets passed the $alexaRequest Parameter
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleLaunchRequest(Request $alexaRequest, callable $callback)
    {
        if ($this->getRequestType($alexaRequest) !== LaunchRequest::TYPE_LAUNCH_REQUEST) {
            return null;
        }

        return $callback($alexaRequest);
    }

    /**
     * @param \DaDaDev\AmazonAlexa\Request $alexaRequest
     * @param array $intentConfiguration An array with the structure <key = string, value = callable>
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
     * @param Request $alexaRequest
     * @param callable $callback The callback gets passed the $alexaRequest Parameter
     * @return mixed|null Returns the value returned by the callback if called or null
     */
    public function handleSessionEndRequest(Request $alexaRequest, callable $callback)
    {
        if ($this->getRequestType($alexaRequest) !== LaunchRequest::TYPE_SESSION_ENDED_REQUEST) {
            return null;
        }

        return $callback($alexaRequest);
    }

    /**
     * @param Response $response
     * @return string
     */
    public function createJsonFromResponse(Response $response): string
    {
        return $this->serializer->serialize($response, 'json');
    }

    //region Validation Functions
    /**
     * @return bool
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
     * @throws ValidationException
     */
    private function validateMethod(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            throw new ValidationException('HTTP GET when POST was expected.', 1513625947);
        }

        return true;
    }

    /**
     * @param Request $alexaRequest
     * @return bool
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
     * @return bool
     * @throws ValidationException
     */
    private function validateRequestTimestamp(Request $alexaRequest): bool
    {
        if (null === $alexaRequest->getRequest() || null === $alexaRequest->getRequest()->getTimestamp()) {
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
     * @return bool
     * @throws ValidationException
     */
    private function validateSignatureUrl(string $signatureUrl): bool
    {
        $urlParts = parse_url($signatureUrl);

        if ($urlParts['scheme'] !== self::AMAZON_ALEXA_SKILL_VALIDATION_SCHEME
            || $urlParts['host'] !== self::AMAZON_ALEXA_SKILL_VALIDATION_HOST
            || (array_key_exists('port', $urlParts) && $urlParts['port'] !== 443)
            || strpos($urlParts['path'], self::AMAZON_ALEXA_SKILL_VALIDATION_PATH) !== 0
        ) {
            throw new ValidationException('Wrong signature url.', 1513625947);
        }

        return true;
    }

    /**
     * @param string $signatureCertChainUrl
     * @param string $signature
     * @param string $rawJson
     * @return bool
     * @throws ValidationException
     */
    private function validateSignature(
        string $signatureCertChainUrl,
        string $signature,
        string $rawJson
    ): bool {
        $signatureCertificationFile = file_get_contents($signatureCertChainUrl);
        $sslCheck = openssl_verify($rawJson, base64_decode($signature), $signatureCertificationFile);
        if ($sslCheck !== 1) {
            throw new ValidationException(openssl_error_string(). 1513626524);
        }

        $parsedCertificate = openssl_x509_parse($signatureCertificationFile);
        if (!$parsedCertificate) {
            throw new ValidationException('OpenSSL x509 parsing failed.'. 1513626541);
        }

        if (strpos($parsedCertificate['extensions']['subjectAltName'], self::AMAZON_SUBJECT_ALTERNATIVE_NAME) === false) {
            throw new ValidationException('OpenSSL x509 parsing failed.'. 1513626691);
        }

        $time = time();
        if (!($parsedCertificate['validFrom_time_t'] <= $time && $time <= $parsedCertificate['validTo_time_t'])) {
            throw new ValidationException('Certification expire check failed.'. 1513626803);
        }

        return true;
    }
    //endregion
}