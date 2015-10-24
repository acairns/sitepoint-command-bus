<?php namespace DeckOfCards\Tests\Domain;

use DeckOfCards\Domain\Card;

class CardTest extends \PHPUnit_Framework_TestCase
{
    public function test_it_can_be_created_from_a_string()
    {
        $card = Card::fromString('As');

        $this->assertEquals('A', (string) $card->getRank());
        $this->assertEquals('s', (string) $card->getSuit());
    }
}
