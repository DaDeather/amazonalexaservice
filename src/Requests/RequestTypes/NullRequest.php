<?php

namespace DaDaDev\AmazonAlexa\Requests\RequestTypes;

use DaDaDev\AmazonAlexa\Requests\AbstractRequest;

class NullRequest extends AbstractRequest
{
    public function getType(): string
    {
        return 'NullRequest';
    }
}
