<?php

namespace AbacaphiliacTest\Compliments;

use Abacaphiliac\Compliments\RandomComplimentCommand;
use org\bovigo\vfs\vfsStream;
use Symfony\Component\Console\Input\ArgvInput;
use Symfony\Component\Console\Output\OutputInterface;

class RandomComplimentCommandTest extends \PHPUnit_Framework_TestCase
{
    /** @var  \PHPUnit_Framework_MockObject_MockObject|OutputInterface */
    private $output;
    
    /** @var RandomComplimentCommand */
    private $sut;

    protected function setUp()
    {
        parent::setUp();

        $this->output = $this->getMock('\Symfony\Component\Console\Output\OutputInterface');
        
        $this->sut = new RandomComplimentCommand();
    }
    
    public function testRunWithDefaultValues()
    {
        $this->output->expects(self::atLeastOnce())->method('writeln');

        $input = new ArgvInput(array());
        
        $actual = $this->sut->run($input, $this->output);
        
        self::assertEmpty($actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function testRunWithDirectoryInsteadOfFile()
    {
        $dir = vfsStream::setup('tmp');

        $input = new ArgvInput(array(
            __FILE__,
            '--file=' . $dir->url(),
        ));
        
        $actual = $this->sut->run($input, $this->output);

        self::assertSame(0, $actual);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @throws \InvalidArgumentException
     * @throws \Exception
     */
    public function testRunWithNonReadableFile()
    {
        $dir = vfsStream::setup('tmp');
        $file = vfsStream::newFile('compliments.txt', 0000);
        $dir->addChild($file);

        $input = new ArgvInput(array(
            __FILE__,
            '--file=' . $file->url(),
        ));
        
        $actual = $this->sut->run($input, $this->output);

        self::assertSame(0, $actual);
    }
}
