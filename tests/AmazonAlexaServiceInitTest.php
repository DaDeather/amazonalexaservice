<?php

namespace DaDaDev\AmazonAlexaTests;

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class AmazonAlexaServiceInitTest extends TestCase
{
    private const SOME_APP_ID = 'someAppId';

    /**
     * @var SerializerInterface|MockObject
     */
    private $serializer;

    protected function setUp()
    {
        $this->serializer = $this->getMockBuilder(SerializerInterface::class)
            ->setMethods([
                'serialize',
                'deserialize',
            ])
            ->getMock();
    }

    public function testSuccessfulServiceInitializing(): void
    {
        $sut = new AmazonAlexaService($this->serializer);

        self::assertInstanceOf(AmazonAlexaService::class, $sut);
    }
}
