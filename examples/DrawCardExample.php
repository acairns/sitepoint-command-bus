<?php require_once __DIR__ . '/../bootstrap.php';

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\DrawCard;
use DeckOfCards\Application\Commands\DrawCardHandler;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

$decks = new InMemoryDeckRepository;

$deckId = DeckId::generate();

$decks->add(
    Deck::standard($deckId)
);

$locator->addHandler(
    new DrawCardHandler($decks),
    DrawCard::class
);

$card = $bus->handle(
    new DrawCard((string) $deckId)
);

print_card($card);
echo "\n";
