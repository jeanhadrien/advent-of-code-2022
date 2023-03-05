<?php

// Day 1 
// Part 1 : Find the elf with most calories, how many calories are they carrying ?
// Part 2 : Find the 3 top elf with most calories, how many calories are they carrying in total?

$sum_current_elf_cal = 0;

$lines = file("./input/day1-calories.txt");

$arr_calories = [];

foreach ($lines as $line) {
    if ($line == "\n") {
        $arr_calories[] = $sum_current_elf_cal;
        $sum_current_elf_cal = 0;
    }
    $cal = intval($line);
    $sum_current_elf_cal += intval($cal);
}

rsort($arr_calories);

echo("Elf calories in descending order : ". implode( ", ", $arr_calories));

echo("<br><br> Calories carried by the top elf : " . current($arr_calories));

$top3sum = 0;
for ($i = 1; $i<=3;$i++){
    $top3sum += current($arr_calories);
    next($arr_calories);
}

echo("<br><br> Calories carried by the top 3 elves : " . $top3sum );


?>