<?php

namespace DaDaDev\AmazonAlexaTests\Unit\Requests\AplUserEvent;

use DaDaDev\AmazonAlexa\AmazonAlexaService;
use DaDaDev\AmazonAlexa\Requests\RequestTypes\AplUserEventRequest;
use Doctrine\Common\Annotations\AnnotationRegistry;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;
use PHPUnit\Framework\TestCase;

class DefaultTest extends TestCase
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
        $jsonRequest = file_get_contents(__DIR__ . '/Fixtures/apl_user_event_default.json');
        self::assertNotFalse($jsonRequest);

        $amazonAlexaService = new AmazonAlexaService($this->serializer);
        $request = $amazonAlexaService->getAlexaRequest($jsonRequest);

        self::assertSame('Alexa.Presentation.APL.UserEvent', $request->getRequest()->getType());
        $aplUserEventRequest = $request->getRequest();
        self::assertInstanceOf(AplUserEventRequest::class, $aplUserEventRequest);

        /* @var AplUserEventRequest $aplUserEventRequest */
        self::assertSame([
            'ARGUMENT1',
            'ARGUMENT2',
        ], $aplUserEventRequest->getArguments());

        self::assertSame('VALUE2', $aplUserEventRequest->getComponentValueByKey('ID2'));

        self::assertSame('TouchWrapper', $aplUserEventRequest->getSource()->getType());
        self::assertSame('onPress', $aplUserEventRequest->getSource()->getHandler());
        self::assertSame('buyButton', $aplUserEventRequest->getSource()->getId());
        self::assertFalse($aplUserEventRequest->getSource()->getValue());
    }
}
