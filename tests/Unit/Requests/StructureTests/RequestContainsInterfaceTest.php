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

    public function dataProviderLaunchRequest(): array
    {
        return [
            [
                'fixtureFile' => __DIR__ . '/Fixtures/apl_launch_request_1.json',
                '$expectedSupportedInterfaces' => 2,
            ],
            [
                'fixtureFile' => __DIR__ . '/Fixtures/apl_launch_request_2.json',
                '$expectedSupportedInterfaces' => 3,
            ],
        ];
    }

    /**
     * @dataProvider dataProviderLaunchRequest
     */
    public function testParsingAplLaunchRequestToDetermineSupportedInterface(string $fixtureFile, int $expectedSupportedInterfaces): void
    {
        $jsonRequest = file_get_contents($fixtureFile);
        self::assertNotFalse($jsonRequest);

        $amazonAlexaService = new AmazonAlexaService($this->serializer);
        $request = $amazonAlexaService->getAlexaRequest($jsonRequest);

        self::assertNotEmpty($request->getContext()->getSystem()->getDevice()->getSupportedInterfaces());
        self::assertCount($expectedSupportedInterfaces, $request->getContext()->getSystem()->getDevice()->getSupportedInterfaces());
        self::assertFalse($request->getContext()->getSystem()->getDevice()->doesSupportInterface('APL'));
        self::assertTrue($request->getContext()->getSystem()->getDevice()->doesSupportInterface('Alexa.Presentation.APL'));
        self::assertIsArray($request->getContext()->getSystem()->getDevice()->getSupportedInterfaceByKey('Alexa.Presentation.APL'));
    }
}
