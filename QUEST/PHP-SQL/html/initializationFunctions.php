<?php

namespace TrumpWarGame;

use TrumpWarGame\Card;
use TrumpWarGame\Player;

// プレイヤー人数を取得する
function getPlayerCount()
{
    $inputPlayerCount = 0;
    while ($inputPlayerCount < 2 || $inputPlayerCount > 5) {
        echo 'プレイヤーの人数を入力してください（2〜5）: ';
        $inputPlayerCount = fgets(STDIN);
    }

    return intval($inputPlayerCount);
}

// カード一覧を生成
function generateCards($config)
{
    $cards = [];
    $card_ranks = $config['card_ranks'];
    $suit_names = $config['suit_names'];

    foreach ($suit_names as $suit_name) {
        foreach ($card_ranks as $index => $card_rank) {
            $cardName = $suit_name . 'の' . $card_rank;
            $cards[] = new Card($cardName, $index);
        }
    }

    // STEP4 ジョーカー追加
    $cards[] = new Card('ジョーカー', 13);

    return $cards;
}


// ユーザ一覧を生成
function generatePlayers($playerCount)
{
    $players = [];

    for ($i = 0; $i < $playerCount; $i++) {
        echo 'プレイヤー' . $i + 1 . 'の名前を入力してください: ';
        $name = rtrim(fgets(STDIN));
        $players[] = new Player($name);
    }

    return $players;
}

function distributeCardsForPlayer($players, $cards, $playerCount)
{
    $cardIndex = 0;
    // プレイヤーにランダムにカードを分配
    while (!empty($cards)) {
        $card = array_pop($cards);
        $players[$cardIndex]->addHandCard($card);
        $cardIndex = ($cardIndex + 1) % $playerCount;
    }

    return $players;
}
