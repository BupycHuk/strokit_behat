<?php

namespace Acme\BehatBundle\Features\Context;

use Acme\BehatBundle\Entity\Post;
use Behat\Behat\Event\StepEvent;
use Behat\Behat\Event\SuiteEvent;
use Behat\Mink\Driver\Selenium2Driver;
use Doctrine\ORM\EntityManager;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;
use Behat\Symfony2Extension\Context\KernelAwareInterface;
use Behat\MinkExtension\Context\MinkContext;

use Behat\Behat\Context\BehatContext,
    Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\PyStringNode,
    Behat\Gherkin\Node\TableNode;

//
// Require 3rd-party libraries here:
//
//   require_once 'PHPUnit/Autoload.php';
//   require_once 'PHPUnit/Framework/Assert/Functions.php';
//

/**
 * Feature context.
 */
class FeatureContext extends MinkContext //if you want to test web
                  implements KernelAwareInterface
{
    private $kernel;
    private $parameters;
    /**
     * @Given /^the database is clean$/
     */
    public function theDatabaseIsClean()
    {
        $em = $this->kernel->getContainer()->get('doctrine.orm.entity_manager');
        $em->createQuery('DELETE AcmeBehatBundle:Post')->execute();
        $em->flush();
    }

    /**
     * @Given /^one post in database$/
     */
    public function onePostInDatabase(TableNode $postTable)
    {

        $row = $postTable->getRow(1);
        $doctrine = $this->kernel->getContainer()->get('doctrine');
        $em = $doctrine->getManager();

        $post = new Post();
        $post->setContent($row[0]);
        $post->setTitle($row[1]);
        $em->persist($post);
        $em->flush();
    }

    /**
     * @Given /^many post in database$/
     */
    public function manyPostInDatabase(TableNode $table)
    {

        $rows = $table->getHash();
        $doctrine = $this->kernel->getContainer()->get('doctrine');
        $em = $doctrine->getManager();

        foreach ($rows as $row)
        {
            $post = new Post();
            $post->setContent($row['Content']);
            $post->setTitle($row['Title']);
            $em->persist($post);
        }
        $em->flush();
    }

    /**
     * Initializes context with parameters from behat.yml.
     *
     * @param array $parameters
     */
    public function __construct(array $parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Sets HttpKernel instance.
     * This method will be automatically called by Symfony2Extension ContextInitializer.
     *
     * @param KernelInterface $kernel
     */
    public function setKernel(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * Take screenshot when step fails.
     * Works only with Selenium2Driver.
     *
     * @AfterStep
     */
    public function takeScreenshotAfterFailedStep(StepEvent $event) {
        if (StepEvent::FAILED === $event->getResult()) {
            $driver = $this->getSession()->getDriver();
            if ($driver instanceof Selenium2Driver) {
                $step = $event->getStep();
                $id = $step->getParent()->getTitle() . '.' . $step->getType() . ' ' . $step->getText();
                $fileName = 'Fail.'.preg_replace('/[^a-zA-Z0-9-_\.]/','_', $id) . '.jpg';
                file_put_contents($fileName, $driver->getScreenshot());
            }
        }
    }

//
// Place your definition and hook methods here:
//
//    /**
//     * @Given /^I have done something with "([^"]*)"$/
//     */
//    public function iHaveDoneSomethingWith($argument)
//    {
//        $container = $this->kernel->getContainer();
//        $container->get('some_service')->doSomethingWith($argument);
//    }
}
