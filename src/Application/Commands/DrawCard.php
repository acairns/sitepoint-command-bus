<?php namespace DeckOfCards\Application\Commands;

use DeckOfCards\Domain\DeckId;

final class DrawCard
{
    /**
     * @var DeckId
     */
    private $id;

    /**
     * @param DeckId $id
     */
    public function __construct(DeckId $id)
    {
        $this->id = $id;
    }

    /**
     * @return DeckId
     */
    public function getId()
    {
        return $this->id;
    }
}
