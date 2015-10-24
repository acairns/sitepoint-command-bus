<?php namespace DeckOfCards\Domain;

final class Deck
{
    /**
     * @var DeckId
     */
    private $id;

    /**
     * @var Card[]
     */
    private $cards;

    /**
     * @param DeckId $id
     * @param Card[] $cards
     */
    public function __construct(DeckId $id, $cards)
    {
        $this->id = $id;

        $this->cards = $cards;
    }

    /**
     * @param DeckId $deckId
     * @return Deck
     */
    public static function standard(DeckId $deckId)
    {
        return new Deck(
            $deckId,
            [
                Card::fromString('As'),
                Card::fromString('2s'),
                Card::fromString('3s'),
                Card::fromString('4s'),
                Card::fromString('5s'),
                Card::fromString('6s'),
                Card::fromString('7s'),
                Card::fromString('8s'),
                Card::fromString('9s'),
                Card::fromString('Ts'),
                Card::fromString('Js'),
                Card::fromString('Qs'),
                Card::fromString('Ks'),

                Card::fromString('Ad'),
                Card::fromString('2d'),
                Card::fromString('3d'),
                Card::fromString('4d'),
                Card::fromString('5d'),
                Card::fromString('6d'),
                Card::fromString('7d'),
                Card::fromString('8d'),
                Card::fromString('9d'),
                Card::fromString('Td'),
                Card::fromString('Jd'),
                Card::fromString('Qd'),
                Card::fromString('Kd'),

                Card::fromString('Ac'),
                Card::fromString('2c'),
                Card::fromString('3c'),
                Card::fromString('4c'),
                Card::fromString('5c'),
                Card::fromString('6c'),
                Card::fromString('7c'),
                Card::fromString('8c'),
                Card::fromString('9c'),
                Card::fromString('Tc'),
                Card::fromString('Jc'),
                Card::fromString('Qc'),
                Card::fromString('Kc'),

                Card::fromString('Ah'),
                Card::fromString('2h'),
                Card::fromString('3h'),
                Card::fromString('4h'),
                Card::fromString('5h'),
                Card::fromString('6h'),
                Card::fromString('7h'),
                Card::fromString('8h'),
                Card::fromString('9h'),
                Card::fromString('Th'),
                Card::fromString('Jh'),
                Card::fromString('Qh'),
                Card::fromString('Kh'),
            ]
        );
    }

    /**
     * @return DeckId
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Card[]
     */
    public function getCards()
    {
        return $this->cards;
    }

    public function shuffle()
    {
        shuffle($this->cards);
    }
}
