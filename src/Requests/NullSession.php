<?php

namespace DaDaDev\AmazonAlexa\Requests;

use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Application;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullApplication;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullUser;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\User;

class NullSession extends Session
{
    /**
     * @return Application
     */
    public function getApplication(): Application
    {
        return new NullApplication();
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return new NullUser();
    }
}
