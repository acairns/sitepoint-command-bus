<?php require_once __DIR__ . '/vendor/autoload.php';

use DeckOfCards\Domain\Deck;
use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;

$locator = new InMemoryLocator([]);

$handlerMiddleware = new CommandHandlerMiddleware(
    new ClassNameExtractor,
    $locator,
    new HandleInflector
);

$bus = new CommandBus([$handlerMiddleware]);

function print_deck(Deck $deck)
{
    echo "Deck ID: {$deck->getId()}\n";

    echo "Cards: " . join($deck->getCards(), ',') . "\n";
}
