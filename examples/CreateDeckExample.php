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

$deckId = DeckId::generate();

$bus->handle(
    new CreateDeck((string) $deckId)
);

print_deck(
    $decks->findById($deckId)
);
echo "\n";
