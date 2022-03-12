<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\DrawCard;

$deckId = DeckId::generate();

$decks->add(
    Deck::standard($deckId)
);

$card = $bus->handle(
    new DrawCard((string) $deckId)
);

print_card($card);
echo "\n";
