<?php

use DeckOfCards\Domain\DeckId;
use DeckOfCards\Application\Commands\CreateDeck;

$tactician = include __DIR__ . '/../setup.php';

$command = new CreateDeck(
    DeckId::generate()
);

$tactician->handle($command);
