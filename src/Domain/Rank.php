<?php namespace DeckOfCards\Domain;

final class Rank
{
    /**
     * @var string
     */
    private $rank;

    /**
     * @var string[]
     */
    private static $ranks = [
        '2', '3', '4', '5', '6', '7', '8', '9', 'T', 'J', 'Q', 'K', 'A'
    ];

    /**
     * @param string $rank
     */
    private function __construct($rank)
    {
        $this->rank = $rank;
    }

    /**
     * @param string $rank
     * @return Rank
     */
    public static function fromString($rank)
    {
        $rank = strtoupper((string) $rank);

        if (! in_array($rank, static::$ranks)) {
            throw new IncorrectRankValue();
        }

        return new Rank($rank);
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->rank;
    }
}
