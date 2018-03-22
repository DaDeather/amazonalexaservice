<?php

namespace DaDaDev\AmazonAlexaTests;

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class AmazonAlexaServiceInitTest extends TestCase
{
    private const SOME_APP_ID = 'someAppId';

    /**
     * @var SerializerInterface|\PHPUnit_Framework_MockObject_MockObject
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

    public function testSuccessfullServiceInitializing(): void
    {
        $sut = new AmazonAlexaService(self::SOME_APP_ID, $this->serializer);

        self::assertInstanceOf(AmazonAlexaService::class, $sut);
    }

    public function testFailingServiceInitializingEmptyAppId(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please provide a valid alexa skill app id.');
        $this->expectExceptionCode(1544878800);

        $sut = new AmazonAlexaService('', $this->serializer);
    }

    public function testFailingServiceInitializingWhitespacedAppId(): void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Please provide a valid alexa skill app id.');
        $this->expectExceptionCode(1544878800);

        $sut = new AmazonAlexaService('    ', $this->serializer);
    }
}
