<?php namespace DeckOfCards\Application\Commands;

use DeckOfCards\Domain\DeckRepository;

final class ShuffleDeckHandler
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
     * @param ShuffleDeck $command
     */
    public function handle(ShuffleDeck $command)
    {
        $deck = $this->decks->findById(
            $command->getId()
        );

        $deck->shuffle();

        $this->decks->add($deck);
    }
}
