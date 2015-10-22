<?php

final class HelloWorldHandler
{
    public function handle(HelloWorld $command)
    {
        echo $command->getMessage();
    }
}
