<?php

namespace Abacaphiliac\Compliments;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class RandomComplimentCommand extends Command
{
    /**
     * @throws \InvalidArgumentException
     * @throws \Symfony\Component\Console\Exception\InvalidArgumentException
     */
    protected function configure()
    {
        $this->setName('random:compliment')
            ->setDescription('Compliment user')
            ->addOption(
                'file',
                'f',
                InputOption::VALUE_OPTIONAL,
                'Source file',
                realpath(dirname(dirname(__DIR__)) . '/compliments.txt')
            )
            ->addOption('width', 'w', InputOption::VALUE_OPTIONAL, 'Console width', 80)
            ->addOption('delimiter', 'd', InputOption::VALUE_OPTIONAL, 'Console delimiter', '=');
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|null|void
     * @throws \InvalidArgumentException
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $compliments = $this->getCompliments($input);
        $compliment = $compliments[array_rand($compliments)];

        $consoleWidth = $input->getOption('width');
        $boundaryDelimiter = $input->getOption('delimiter');
        $boundary = str_repeat($boundaryDelimiter, $consoleWidth);
        
        $output->writeln($boundary . PHP_EOL);
        $output->writeln(sprintf('By the way... %s', $compliment));
        $output->writeln($boundary);
    }

    /**
     * @param InputInterface $input
     * @return string[]
     * @throws \InvalidArgumentException
     */
    protected function getCompliments(InputInterface $input)
    {
        $file = $input->getOption('file');

        if (!is_file($file)) {
            throw new \InvalidArgumentException(sprintf('Path [%s] is not a file.', $file));
        }

        if (!is_readable($file)) {
            throw new \InvalidArgumentException(sprintf('File [%s] is not readable.', $file));
        }

        return file($file);
    }
}
