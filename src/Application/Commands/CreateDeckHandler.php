<?php namespace DeckOfCards\Application\Commands;

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckRepository;

final class CreateDeckHandler
{
    /**
     * @var DeckRepository
     */
    private $decks;

    /**
     * @param DeckRepository $decks
     */
    public function __construct(DeckRepository $decks)
    {
        $this->decks = $decks;
    }

    /**
     * @param CreateDeck $command
     */
    public function handle(CreateDeck $command)
    {
        $id = $command->getId();

        $deck = Deck::standard($id);

        $this->decks->add($deck);
    }
}
