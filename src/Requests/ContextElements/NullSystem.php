<?php

namespace DaDaDev\AmazonAlexa\Requests\ContextElements;

use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Application;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\Device;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullApplication;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullDevice;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\NullUser;
use DaDaDev\AmazonAlexa\Requests\ContextElements\SystemElements\User;

class NullSystem extends System
{
    /**
     * @return NullDevice
     */
    public function getDevice(): Device
    {
        return new NullDevice();
    }

    /**
     * @return NullApplication
     */
    public function getApplication(): Application
    {
        return new NullApplication();
    }

    /**
     * @return NullUser
     */
    public function getUser(): User
    {
        return new NullUser();
    }
}
