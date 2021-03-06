<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;

class LaunchRequest extends AbstractRequest
{
    public function getType(): string
    {
        return self::TYPE_LAUNCH_REQUEST;
    }
}
