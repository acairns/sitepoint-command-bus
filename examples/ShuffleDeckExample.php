<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\ShuffleDeck;

$deckId = DeckId::generate();

$decks->add(
    Deck::standard($deckId)
);

$bus->handle(
    new ShuffleDeck((string) $deckId)
);

print_deck(
    $decks->findById($deckId)
);
echo "\n";
