<?php

namespace Abacaphiliac\Compliments;

class Application extends \Symfony\Component\Console\Application
{
    /**
     * @return static
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public static function factory()
    {
        $application = new static();
        $application->add(new RandomComplimentCommand());
        
        return $application;
    }
}
