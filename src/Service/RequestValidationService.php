<?php

namespace DaDaDev\AmazonAlexa\Service;

use DaDaDev\AmazonAlexa\Exceptions\ValidationException;
use DaDaDev\AmazonAlexa\Request;

class RequestValidationService
{
    private const AMAZON_SUBJECT_ALTERNATIVE_NAME = 'echo-api.amazon.com';
    private const AMAZON_ALEXA_SKILL_VALIDATION_HOST = 's3.amazonaws.com';
    private const AMAZON_ALEXA_SKILL_VALIDATION_SCHEME = 'https';
    private const AMAZON_ALEXA_SKILL_VALIDATION_PATH = '/echo.api/';

    /**
     * @param string  $alexaSkillAppId
     * @param string  $signatureCertChainUrl
     * @param string  $signature
     * @param string  $rawJsonRequest
     * @param Request $alexaRequest
     *
     * @return bool Returns true or throws an exception on fail
     *
     * @throws ValidationException
     * @throws \Throwable
     */
    public function validateIncomingRequest(
        string $alexaSkillAppId,
        ?string $signatureCertChainUrl,
        ?string $signature,
        string $rawJsonRequest,
        Request $alexaRequest
    ): bool {
        if (!$alexaSkillAppId || !trim($alexaSkillAppId)) {
            throw new \InvalidArgumentException('Please provide a valid alexa skill app id.', 1544878800);
        }

        if (!$signatureCertChainUrl || !$signature) {
            throw new ValidationException('Missing signaturecertchainurl or signature header.', 1513627426);
        }

        try {
            $this->validateRequestingIp();
            $this->validateMethod();
            $this->validateApplicationId($alexaSkillAppId, $alexaRequest);
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
     * @param string  $alexaSkillAppId
     * @param Request $alexaRequest
     *
     * @return bool
     *
     * @throws ValidationException
     */
    private function validateApplicationId(string $alexaSkillAppId, Request $alexaRequest): bool
    {
        if ($alexaRequest->getContext()->getSystem()->getApplication()->getApplicationId() !== $alexaSkillAppId) {
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
        $alexaTimestamp = $alexaRequest->getRequest()->getTimestamp();
        if (null === $alexaTimestamp) {
            throw new ValidationException('Missing timestamp.', 1513627010);
        }

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
