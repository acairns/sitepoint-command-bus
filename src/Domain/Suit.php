<?php namespace DeckOfCards\Domain;

final class Suit
{
    /**
     * @var string
     */
    private $suit;

    /**
     * @var string[]
     */
    private static $suits = [
        's' => 'Spades',
        'h' => 'Hearts',
        'd' => 'Diamonds',
        'c' => 'Clubs'
    ];

    /**
     * @param string $suit
     */
    private function __construct($suit)
    {
        $this->suit = $suit;
    }

    /**
     * @param string $suit
     * @return Suit
     */
    public static function fromString($suit)
    {
        $suit = strtolower((string) $suit);

        if (! in_array($suit, array_keys(static::$suits))) {
            throw new IncorrectSuitValue;
        }

        return new Suit($suit);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->suit;
    }
}
