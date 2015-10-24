<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\ShuffleDeck;
use DeckOfCards\Application\Commands\ShuffleDeckHandler;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

$decks = new InMemoryDeckRepository;

$locator->addHandler(
    new ShuffleDeckHandler($decks),
    ShuffleDeck::class
);

$command = new ShuffleDeck(
    DeckId::generate()
);

$bus->handle($command);
