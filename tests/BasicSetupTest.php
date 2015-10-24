<?php namespace DeckOfCards\Tests;

use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;
use DeckOfCards\Tests\Fixtures\BasicSetup\HelloWorld;
use League\Tactician\Handler\CommandHandlerMiddleware;
use DeckOfCards\Tests\Fixtures\BasicSetup\HelloWorldHandler;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;

class BasicSetupTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var CommandBus
     */
    private $tactician;

    public function setUp()
    {
        $map = [
            HelloWorld::class => new HelloWorldHandler
        ];

        $handlerMiddleware = new CommandHandlerMiddleware(
            new ClassNameExtractor,
            new InMemoryLocator($map),
            new HandleInflector
        );

        $this->tactician = new CommandBus([$handlerMiddleware]);
    }

    public function test_it_executes_a_command()
    {
        $this->expectOutputString('Hello World');

        $this->tactician->handle(
            new HelloWorld('Hello World')
        );
    }
}
