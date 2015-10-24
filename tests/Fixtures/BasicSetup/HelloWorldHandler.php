<?php namespace DeckOfCards\Tests\Fixtures\BasicSetup;

final class HelloWorldHandler
{
    public function handle(HelloWorld $command)
    {
        echo $command->getMessage();
    }
}
