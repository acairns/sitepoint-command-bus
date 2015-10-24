<?php namespace DeckOfCards\Infrastructure\Repositories;

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;
use DeckOfCards\Domain\DeckRepository;

class InMemoryDeckRepository implements DeckRepository
{
    /**
     * @var Deck[]
     */
    private $items;

    /**
     * @param DeckId $deckId
     * @return Deck|null
     */
    public function findById(DeckId $deckId)
    {
        $key = (string) $deckId;

        if (! array_key_exists($key, $this->items)) {
            return null;
        }

        return $this->items[$key];
    }

    /**
     * @param Deck $deck
     */
    public function add(Deck $deck)
    {
        $key = (string) $deck->getId();

        $this->items[$key] = $deck;
    }
}
