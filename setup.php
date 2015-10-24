<?php require_once __DIR__ . '/vendor/autoload.php';

use League\Tactician\CommandBus;
use DeckOfCards\Application\Commands\CreateDeck;
use DeckOfCards\Application\Commands\ShuffleDeck;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use DeckOfCards\Application\Commands\CreateDeckHandler;
use DeckOfCards\Application\Commands\ShuffleDeckHandler;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;

$decks = new InMemoryDeckRepository;

$map = [
    CreateDeck::class => new CreateDeckHandler($decks),
    ShuffleDeck::class => new ShuffleDeckHandler($decks)
];

$handlerMiddleware = new CommandHandlerMiddleware(
    new ClassNameExtractor,
    new InMemoryLocator($map),
    new HandleInflector
);

return new CommandBus([$handlerMiddleware]);
