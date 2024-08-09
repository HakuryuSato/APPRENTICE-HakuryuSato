<?php

function calculate($num1, $num2, $operator)
{
    // 整数チェック
    if (!is_numeric($num1) || !is_numeric($num2) || !ctype_digit($num1) || !ctype_digit($num2)) {
        throw new Exception("num1、num2には整数を入力してください\n");
    }

    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            if ($num2 != 0) {
                return $num1 / $num2;
            } else {
                throw new Exception("ゼロによる割り算は許可されていません\n");
            }
        default:
            throw new Exception("演算子には +、-、*、/ のいずれかを使用してください\n");
    }
}

echo "1番目の整数を入力してください:" . PHP_EOL;
$num1 = trim(fgets(STDIN));

echo "2番目の整数を入力してください:" . PHP_EOL;
$num2 = trim(fgets(STDIN));

echo "演算子(+, -, *, /)を入力してください:" . PHP_EOL;
$operator = trim(fgets(STDIN));

try {
    $result = calculate($num1, $num2, $operator);
    echo "計算結果: " . $result . "\n";
} catch (Exception $e) {
    echo "エラー: " . $e->getMessage();
}
