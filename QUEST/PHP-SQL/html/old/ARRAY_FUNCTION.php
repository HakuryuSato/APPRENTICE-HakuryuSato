<?php


function print_names($names)
{
    # 関数を完成させてください
    foreach($names as $name){
        echo $name. "\n";}


}
print_names(['上田', '田仲', '堀田']);



function square($numbers)
{
    # 関数を完成させてください
    $result=[];
    foreach($numbers as $number){
        $result[] = $number * $number;
    }


    return $result;

}
$squared_numbers = square([5, 7, 10]);
print_r($squared_numbers);




function select_even_numbers($numbers)
{
    # 関数を完成させてください
    $even_numbers = [];
    foreach($numbers as $number){
        if($number % 2 == 0){
            $even_numbers[] = $number;
        }
    }
    return $even_numbers;
    
}

$even_numbers = select_even_numbers([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
print_r($even_numbers);