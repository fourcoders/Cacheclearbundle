<?php

namespace Fourcoders\Bundle\CacheclearBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class CacheclearCommand extends ContainerAwareCommand
{

    protected function configure()
    {
        parent::configure();

        $this->setName('unix:cache:clear');
    }

    /**
     * Executes the current command.
     *
     * @param InputInterface $input  An InputInterface instance
     * @param OutputInterface $output An OutputInterface instance
     *
     * @return integer 0 if everything went fine, or an error code
     *
     * @throws \LogicException When this abstract class is not implemented
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        exec('rm -rf app/cache/*', $retval);
        echo "Empty Cache Directory OK\n";
        exec('rm -rf app/logs/*', $retval);
        echo "Empty Logs Directory OK\n";
        exec('setfacl -R -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs', $retval);
        echo "Change Permissions Cache Directory OK\n";
        exec('setfacl -dR -m u:www-data:rwx -m u:`whoami`:rwx app/cache app/logs', $retval);
        echo "Change Permissions Logs Directory OK\n";
        echo "Empty OK\n";
    }
}