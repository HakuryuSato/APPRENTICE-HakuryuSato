<?php
function timeConversion($s)
{
    # 関数を完成させてください
    $hours = floor($s / 3600);
    $minutes = floor(($s - $hours * 3600) / 60);
    $seconds = $s - $hours * 3600 - $minutes * 60;
    echo $hours . ":" . $minutes . ":" . $seconds . "\n";

}

timeConversion(4210);