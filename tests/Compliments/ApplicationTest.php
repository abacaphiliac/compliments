<?php

namespace AbacaphiliacTest\Compliments;

use Abacaphiliac\Compliments\Application;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    /** @var Application */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->sut = new Application();
    }
    
    public function testHierarchy()
    {
        self::assertInstanceOf('\Symfony\Component\Console\Application', $this->sut);
    }
    
    public function testFactoryInstance()
    {
        $actual = Application::factory();
        
        self::assertInstanceOf('\Abacaphiliac\Compliments\Application', $actual);
    }
    
    public function testFactoryInstanceHasRandomComplimentCommand()
    {
        $application = Application::factory();
        
        $actual = $application->get('random:compliment');
        
        self::assertInstanceOf('\Abacaphiliac\Compliments\RandomComplimentCommand', $actual);
    }
}
