<?php namespace DeckOfCards\Tests\Domain;

use DeckOfCards\Domain\Suit;
use DeckOfCards\Domain\IncorrectSuitValue;

class SuitTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_is_case_insensitive()
    {
        $this->assertEquals('c', (string) Suit::fromString('C'));
        $this->assertEquals('c', (string) Suit::fromString('c'));

        $this->assertEquals('s', (string) Suit::fromString('S'));
        $this->assertEquals('s', (string) Suit::fromString('s'));

        $this->assertEquals('h', (string) Suit::fromString('H'));
        $this->assertEquals('h', (string) Suit::fromString('h'));

        $this->assertEquals('d', (string) Suit::fromString('D'));
        $this->assertEquals('d', (string) Suit::fromString('d'));
    }

    public function test_invalid_suit_throws_exception()
    {
        $this->setExpectedException(IncorrectSuitValue::class);

        Suit::fromString('F');
    }
}
