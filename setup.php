<?php require_once __DIR__ . '/vendor/autoload.php';

use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;

$map = [];

$handlerMiddleware = new CommandHandlerMiddleware(
    new ClassNameExtractor,
    new InMemoryLocator($map),
    new HandleInflector
);

$tactician = new CommandBus([$handlerMiddleware]);

