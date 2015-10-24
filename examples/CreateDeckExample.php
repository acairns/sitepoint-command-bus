<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\CreateDeck;
use DeckOfCards\Application\Commands\CreateDeckHandler;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

$decks = new InMemoryDeckRepository;

$locator->addHandler(
    new CreateDeckHandler($decks),
    CreateDeck::class
);

$command = new CreateDeck(
    DeckId::generate()
);

$bus->handle($command);
