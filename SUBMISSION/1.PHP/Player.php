<?php

namespace TrumpWarGame;

use TrumpWarGame\Card;

class Player
{
    private $playerName;
    private $handCards = [];

    public function __construct($playerName)
    {
        $this->playerName = $playerName;
    }

    public function getPlayerName()
    {
        return $this->playerName;
    }

    public function getHandCardsCount()
    {
        return count($this->handCards);
    }

    public function addHandCard($card)
    {
        $this->handCards[] = $card;
    }

    public function drawHandCards()
    {
        return array_pop($this->handCards);
    }
}
