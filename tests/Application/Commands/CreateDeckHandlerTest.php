<?php namespace DeckOfCards\Tests\Application\Commands;

use DeckOfCards\Application\Commands\CreateDeck;
use DeckOfCards\Application\Commands\CreateDeckHandler;
use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Infrastructure\Repositories\InMemoryDeckRepository;

class CreateDeckHandlerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var InMemoryDeckRepository
     */
    private $repository;

    /**
     * @var CreateDeckHandler
     */
    private $handler;

    public function setUp()
    {
        $this->repository = new InMemoryDeckRepository;

        $this->handler = new CreateDeckHandler(
            $this->repository
        );
    }

    public function test_it_adds_new_deck_into_repository()
    {
        $deckId = DeckId::generate();

        $this->assertNull(
            $this->repository->findById($deckId)
        );

        $command = new CreateDeck($deckId);

        $this->handler->handle($command);

        $this->assertInstanceOf(
            Deck::class,
            $this->repository->findById($deckId)
        );
    }
}
