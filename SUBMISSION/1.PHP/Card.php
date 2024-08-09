<?php

namespace TrumpWarGame;

// カード用クラス
class Card
{
    private $cardName;
    private $rank;

    public function __construct($cardName, $rank)
    {
        $this->cardName = $cardName;
        $this->rank = $rank;
    }

    public function getCardName()
    {
        return $this->cardName;
    }



    public function getRank()
    {
        return $this->rank;
    }
}
