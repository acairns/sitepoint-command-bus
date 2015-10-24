<?php namespace DeckOfCards\Tests\Application\Commands;

use DeckOfCards\Application\Commands\ShuffleDeck;
use DeckOfCards\Application\Commands\ShuffleDeckHandler;
use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

class ShuffleDeckHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InMemoryDeckRepository
     */
    private $repository;

    /**
     * @var ShuffleDeckHandler
     */
    private $handler;

    public function setUp()
    {
        $this->repository = new InMemoryDeckRepository;

        $this->handler = new ShuffleDeckHandler(
            $this->repository
        );
    }

    public function test_it_shuffles_the_cards_within_the_deck()
    {
        $deckId = DeckId::generate();

        $deck = Deck::standard($deckId);

        $cards = $deck->getCards();

        $this->repository->add($deck);

        $this->handler->handle(
            new ShuffleDeck($deckId)
        );

        $deck = $this->repository->findById($deckId);

        $this->assertNotEquals(
            $cards,
            $deck->getCards()
        );
    }
}
