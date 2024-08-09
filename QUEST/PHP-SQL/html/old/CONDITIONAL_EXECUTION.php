<?php

function greater($x, $y){
    # 関数を完成させてください
    if ($x > $y) {
        echo "x > y";
    } else if ($x < $y) {
        echo "x < y";
    } else {
        echo "x == y";
    }
    echo "\n";
}

greater(5, 4);
greater(-50, -40);
greater(10, 10);



function train_fare($age)
{
    # 関数を完成させてください
    $cost = 0;
    if ($age >= 12) {
        $cost = 200;
    } else if ($age >= 6) {
        $cost = 100;
    } else {
        $cost = 0;
    }

    echo $cost . "\n";
}

train_fare(12);
train_fare(6);
train_fare(5);

function xor_function($x, $y)
{
    # 関数を完成させてください
    if($x || $y){
        echo "true\n";
    }else{
        echo "false\n";
    }

}

xor_function(true, true);
xor_function(true, false);
xor_function(false, true);
xor_function(false, false);