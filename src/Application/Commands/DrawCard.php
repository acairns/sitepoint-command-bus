<?php namespace DeckOfCards\Application\Commands;

use DeckOfCards\Domain\DeckId;

final class DrawCard
{
    /**
     * @var string
     */
    private $id;

    /**
     * @param string $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return DeckId
     */
    public function getId()
    {
        return DeckId::fromString($this->id);
    }
}
