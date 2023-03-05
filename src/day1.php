<a href=/adventofcode2022 /> Back to list </a> </br>
<style>
    <?php include '../style.css'; ?>
</style>

<?php

// Part 1 : Find the elf with most calories, how many calories are they carrying ?

$sum_current_elf_cal = 0;
$elf_calories = [];
$lines = file("../input/day1-calories.txt");

foreach ($lines as $line) {
    // If empty line, save total for current elf and reset
    if ($line == "\n" or $line == "\r") {
        $elf_calories[] = $sum_current_elf_cal;
        $sum_current_elf_cal = 0;
    }

    // Keep track of the current elf total calories
    $cal = intval($line);
    $sum_current_elf_cal += intval($cal);
}

rsort($elf_calories);
echo ("Elf calories in descending order : " . implode(", ", $elf_calories));
echo ("<br><br> Calories carried by the top elf : " . current($elf_calories));

// Part 2 : Find the 3 top elf with most calories, how many calories are they carrying in total?

$top3sum = 0;

for ($i = 1; $i <= 3; $i++) {
    $top3sum += current($elf_calories);
    next($elf_calories);
}

echo ("<br><br> Calories carried by the top 3 elves : " . $top3sum);


?>