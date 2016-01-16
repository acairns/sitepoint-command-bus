<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\ShuffleDeck;
use DeckOfCards\Application\Commands\ShuffleDeckHandler;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

$decks = new InMemoryDeckRepository;

$deckId = DeckId::generate();

$decks->add(
    Deck::standard($deckId)
);

$locator->addHandler(
    new ShuffleDeckHandler($decks),
    ShuffleDeck::class
);

$bus->handle(
    new ShuffleDeck((string) $deckId)
);

print_deck(
    $decks->findById($deckId)
);
echo "\n";
