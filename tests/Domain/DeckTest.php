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

    public function test_it_can_shuffle_the_deck()
    {
        $deck = Deck::standard(
            DeckId::generate()
        );

        $before = $deck->getCards();

        $deck->shuffle();

        $after = $deck->getCards();

        $this->assertNotEquals($before, $after);
    }

    public function test_a_card_can_be_drawn_from_the_deck()
    {
        $deck = Deck::standard(
            DeckId::generate()
        );

        $card = $deck->drawCard();

        $this->assertEquals('As', $card);
    }

    public function test_drawing_card_removes_card_from_deck()
    {
        $deck = Deck::standard(
            DeckId::generate()
        );

        $this->assertCount(52, $deck->getCards());

        $deck->drawCard();

        $this->assertCount(51, $deck->getCards());
    }
}
