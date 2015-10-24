<?php namespace DeckOfCards\Tests\Domain;

use DeckOfCards\Domain\Deck;
use DeckOfCards\Domain\DeckId;

class DeckTest extends \PHPUnit_Framework_TestCase
{
    public function test_a_standard_deck_consists_of_52_cards()
    {
        $deck = Deck::standard(
            DeckId::generate()
        );

        $cards = $deck->getCards();

        $this->assertCount(52, $cards);
    }
}
