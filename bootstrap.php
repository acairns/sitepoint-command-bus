<?php require_once __DIR__ . '/vendor/autoload.php';

use DeckOfCards\Domain\Card;
use DeckOfCards\Domain\Deck;
use League\Tactician\CommandBus;
use League\Tactician\Handler\Locator\InMemoryLocator;
use League\Tactician\Handler\CommandHandlerMiddleware;
use League\Tactician\Handler\MethodNameInflector\HandleInflector;
use League\Tactician\Handler\CommandNameExtractor\ClassNameExtractor;

use DeckOfCards\Application\Commands\CreateDeck;
use DeckOfCards\Application\Commands\CreateDeckHandler;
use DeckOfCards\Application\Commands\DrawCard;
use DeckOfCards\Application\Commands\DrawCardHandler;
use DeckOfCards\Application\Commands\ShuffleDeck;
use DeckOfCards\Application\Commands\ShuffleDeckHandler;

use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

$decks = new InMemoryDeckRepository;

$locator = new InMemoryLocator([]);

$locator->addHandler(
    new ShuffleDeckHandler($decks),
    ShuffleDeck::class
);
$locator->addHandler(
    new DrawCardHandler($decks),
    DrawCard::class
);
$locator->addHandler(
    new CreateDeckHandler($decks),
    CreateDeck::class
);

$handlerMiddleware = new CommandHandlerMiddleware(
    new ClassNameExtractor,
    $locator,
    new HandleInflector
);

$bus = new CommandBus([$handlerMiddleware]);

function print_card(Card $card)
{
    echo "[{$card->getRank()}{$card->getSuit()}]";
}

function print_deck(Deck $deck)
{
    echo "Deck ID: {$deck->getId()}\n";

    echo "Cards: \n";

    foreach ($deck->getCards() as $card) {
        print_card($card);
    }
}
