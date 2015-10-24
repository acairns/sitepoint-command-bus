<?php namespace DeckOfCards\Application\Commands;

use DeckOfCards\Domain\Card;
use DeckOfCards\Domain\DeckRepository;

final class DrawCardHandler
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
     * @param DrawCard $command
     * @return Card
     */
    public function handle(DrawCard $command)
    {
        $deck = $this->decks->findById(
            $command->getId()
        );

        $card = $deck->drawCard();

        $this->decks->add($deck);

        return $card;
    }
}
