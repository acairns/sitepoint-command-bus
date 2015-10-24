<?php namespace DeckOfCards\Domain;

interface DeckRepository
{
    /**
     * @param DeckId $deckId
     * @return Deck
     */
    public function findById(DeckId $deckId);

    /**
     * @param Deck $deck
     */
    public function add(Deck $deck);
}
