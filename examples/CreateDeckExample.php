<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\CreateDeck;

$deckId = DeckId::generate();

$bus->handle(
    new CreateDeck((string) $deckId)
);

print_deck(
    $decks->findById($deckId)
);
echo "\n";
