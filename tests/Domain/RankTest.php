<?php namespace DeckOfCards\Tests\Domain;

use DeckOfCards\Domain\Rank;
use DeckOfCards\Domain\IncorrectRankValue;

class RankTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_is_case_insensitive()
    {
        $this->assertEquals('T', (string) Rank::fromString('t'));
        $this->assertEquals('T', (string) Rank::fromString('t'));

        $this->assertEquals('J', (string) Rank::fromString('j'));
        $this->assertEquals('J', (string) Rank::fromString('J'));

        $this->assertEquals('Q', (string) Rank::fromString('q'));
        $this->assertEquals('Q', (string) Rank::fromString('Q'));

        $this->assertEquals('K', (string) Rank::fromString('k'));
        $this->assertEquals('K', (string) Rank::fromString('K'));

        $this->assertEquals('A', (string) Rank::fromString('a'));
        $this->assertEquals('A', (string) Rank::fromString('A'));
    }

    public function test_invalid_rank_throws_exception()
    {
        $this->setExpectedException(IncorrectRankValue::class);

        Rank::fromString('F');
    }
}
