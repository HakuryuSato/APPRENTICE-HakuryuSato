<?php

namespace TrumpWarGame;

require 'initializationFunctions.php';
require 'gameFunctions.php';
require 'Card.php';
require 'Player.php';

$config = require 'config.php';

echo '戦争を開始します。' . PHP_EOL;

// プレイヤー人数を取得
$playerCount = getPlayerCount();

// プレイヤー一覧を生成
$players = generatePlayers($playerCount);

// カード一覧を生成
$cards = generateCards($config);

// カードをランダムに並び替える
shuffle($cards);

// カードをプレイヤーに分配
$players = distributeCardsForPlayer($players, $cards, $playerCount);

// ゲーム実行
mainGameFunction($players, $playerCount);
