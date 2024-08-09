<?php



function hundred_hello()
{
    # 関数を完成させてください
    $text = "こんにちは！";
    for ($i = 0; $i < 100; $i++) {
        echo $text . "\n";
    }
}

// hundred_hello(); //ログが流れるためコメントアウト


function count_sheep($n)
{
    # 関数を完成させてください
    for ($i = 0; $i < $n; $i++) {
        echo "羊が" . $i . "匹\n";
    }
}


count_sheep(3);


function sum_1_100()
{
    # 関数を完成させてください

    $sum = 0;
    for ($i = 1; $i <= 100; $i++) {
        $sum += $i;
    }
    echo $sum . "\n";
}

sum_1_100();

function sum_x_y($x, $y)
{
    # 関数を完成させてください
    $sum = 0;
    for ($i = $x; $i <= $y; $i++) {
        $sum += $i;
    }
    echo $sum . "\n";
}

sum_x_y(10, 80);



function fibonacci($n)
{
    # 関数を完成させてください

    $sum = 0;

    if ($n == 0) {
        $sum = 0;
    } else if ($n == 1) {
        $sum = 1;
    } else {
        $sum = 0;
        $fib1 = 0;
        $fib2 = 1;

        for ($i = 2; $i <= $n; $i++) {
            $sum = $fib1 + $fib2;
            $fib1 = $fib2;
            $fib2 = $sum;
        }
    }


    echo $sum . "\n";
}


fibonacci(0);
fibonacci(1);
fibonacci(2);
fibonacci(3);
fibonacci(4);
fibonacci(7);
fibonacci(30);
