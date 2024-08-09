<?php

namespace TrumpWarGame;

// 場札を初期化
function initializeTableCards(&$tableCards)
{
    $tableCards = [];
}

// カードを場にセット
function setCards($players, &$tableCards)
{
    foreach ($players as $player) {
        $card = $player->drawHandCards();
        $tableCards[] = $card;
        $playerName = $player->getPlayerName();
        echo $playerName . "のカードは" . $card->getCardName() . "です。" . PHP_EOL;
    }
}

// カードのランクを取得
function getCardRanks($tableCards)
{
    return array_map(function ($card) {
        return $card->getRank();
    }, $tableCards);
}

function getCurrentCards($tableCards, $playersCount)
{
    return array_slice($tableCards, -$playersCount);
}


// 現在のカードのランクを取得
function getCurrentCardRanks($tableCards, $playersCount)
{
    $currentCards = array_slice($tableCards, -$playersCount);
    return getCardRanks($currentCards);
}

// カードに特定の名前を含むものがあるか
function containsCardName($cards, $name)
{
    foreach ($cards as $index => $card) {
        if ($card->getCardName() === $name) {
            return $index;
        }
    }
    return false;
}


// 勝者がいるなら$player　いなければfalseを返す
function getWinner($tableCards, $players, $playerCount)
{
    $cardRanks = getCurrentCardRanks($tableCards, $playerCount);
    $maxVal = max($cardRanks);
    $valuesCount = array_count_values($cardRanks);
    $maxCount = $valuesCount[$maxVal];
    if ($maxCount == 1) {
        $winner_index = array_search($maxVal, $cardRanks);
        return $players[$winner_index];
    } else { // 引き分け
        // STEP 4 // 一番強いカードがA(12) かつ スペードのAが含まれるなら

        $currentCards = getCurrentCards($tableCards, $playerCount);
        $SpadePlayerIndex = containsCardName($currentCards, 'スペードのA');
        if ($maxVal === 12 && $SpadePlayerIndex !== false) {
            echo "世界一" . PHP_EOL;
            return $players[$SpadePlayerIndex];
        }
        return false;
    }
}

// 勝者にカードを配布
function distributeCardsForWinner($winner, &$tableCards)
{
    $winnerName = $winner->getPlayerName();
    $tableCardsCount = count($tableCards);
    foreach ($tableCards as $card) {
        $winner->addHandCard($card);
    }
    echo $winnerName . "が勝ちました。" . $winnerName . "はカードを" . $tableCardsCount . "枚もらいました。" . PHP_EOL;
    initializeTableCards($tableCards);
}



// カードが0枚のプレイヤーがいるか判定
function checkPlayersHandCardsCount($players)
{
    $playersHandCardsCount = [];
    foreach ($players as $player) {
        $playersHandCardsCount[] = $player->getHandCardsCount();
    }
    // もしカード0枚のプレイヤーがいるなら：$playerを返す
    if (in_array(0, $playersHandCardsCount)) {
        $noneCardPlayerIndex = array_search(0, $playersHandCardsCount);
        $noneCardPlayerName = $players[$noneCardPlayerIndex]->getPlayerName();
        echo $noneCardPlayerName . "の手札がなくなりました。" . PHP_EOL;
        return false;
    } else {
        return true;
    }
}


// ランキングを決定
function determineRanking($players)
{

    // $playersをコピー *順序を他で使用しており、並び替えにリスクがあるため
    $playersRanking = $playersRanking = array_map(function ($player) {
        return clone $player;
    }, $players);

    usort($playersRanking, function ($a, $b) {
        return $b->getHandCardsCount() - $a->getHandCardsCount();
    });

    foreach ($playersRanking as $player) {
        echo $player->getPlayerName() . "の手札の枚数は" . $player->getHandCardsCount() . "枚です。";
        echo PHP_EOL;
    }

    foreach ($playersRanking as $index => $player) {
        echo $player->getPlayerName() . "が" . ($index + 1) . "位です。";
    }

    echo PHP_EOL;
}

function endGame($players)
{
    determineRanking($players);
    echo "戦争を終了します。" . PHP_EOL;
}

// ゲーム関数メイン
function mainGameFunction($players, $playerCount)
{
    $tableCards = [];

    while (checkPlayersHandCardsCount($players)) { // 手持ち0枚のプレイヤーが出るまで
        echo "戦争！" . PHP_EOL;
        setCards($players, $tableCards);
        $winner = getWinner($tableCards, $players, $playerCount);
        if ($winner !== false) { // 勝者がいるなら
            distributeCardsForWinner($winner, $tableCards);
            initializeTableCards($tableCards);
        } else { // 引き分けなら
            echo "引き分けです。" . PHP_EOL;
        }
    }

    // ゲーム終了
    endGame($players);
}
