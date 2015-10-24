<?php namespace DeckOfCards\Domain;

final class Card
{
    /**
     * @var Rank
     */
    private $rank;

    /**
     * @var Suit
     */
    private $suit;

    /**
     * @param Rank $rank
     * @param Suit $suit
     */
    public function __construct(Rank $rank, Suit $suit)
    {
        $this->rank = $rank;

        $this->suit = $suit;
    }

    /**
     * @param string $card
     * @return Card
     */
    public static function fromString($card)
    {
        list($rank, $suit) = str_split($card);

        return new Card(
            Rank::fromString($rank),
            Suit::fromString($suit)
        );
    }

    /**
     * @return Rank
     */
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return Suit
     */
    public function getSuit()
    {
        return $this->suit;
    }
}
