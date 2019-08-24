<?php

namespace DaDaDev\AmazonAlexaTests\Unit\Requests\StructureTests;

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class RequestContainsInterfaceTest extends TestCase
{
    /** @var SerializerInterface */
    private $serializer;

    protected function setUp()
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->serializer = SerializerBuilder::create()
            ->build();
    }

    public function testParsingAplLaunchRequestToDetermineSupportedInterface(): void
    {
        $jsonRequest = file_get_contents(__DIR__ . '/Fixtures/apl_launch_request.json');
        self::assertNotFalse($jsonRequest);

        $amazonAlexaService = new AmazonAlexaService($this->serializer);
        $request = $amazonAlexaService->getAlexaRequest($jsonRequest);

        self::assertNotEmpty($request->getContext()->getSystem()->getDevice()->getSupportedInterfaces());
        self::assertCount(2, $request->getContext()->getSystem()->getDevice()->getSupportedInterfaces());
        self::assertFalse($request->getContext()->getSystem()->getDevice()->doesSupportInterface('APL'));
        self::assertTrue($request->getContext()->getSystem()->getDevice()->doesSupportInterface('Alexa.Presentation.APL'));
        self::assertIsArray($request->getContext()->getSystem()->getDevice()->getSupportedInterfaceByKey('Alexa.Presentation.APL'));
    }
}
