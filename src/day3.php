<a href=/adventofcode2022 /> Back to list </a> </br>
<style>
    <?php include '../style.css'; ?>
</style>

<?php

include("helpers.php");

$rucksacks = readLinesInInputFileAndCleanBasedOnRegex("../input/day3-rucksacks.txt", "/[^A-Za-z\d]/");
$score = str_split(" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");

// Part 1

$sum = 0;

foreach ($rucksacks as $r) {

    // Make sure the string has an even amount of characters
    if ((strlen($r)) % 2) {
        throw new Exception("Invalid input file");
    }

    // Get each rucksack component, as array of characters
    $first_half = str_split(substr($r, 0, strlen($r) / 2));
    $second_half = str_split(substr($r, strlen($r) / 2));

    #echo substr($r,0,strlen($r)/2) . "  -  " . substr($r,strlen($r)/2);

    $duplicates = [];

    // Iterate over the characters of the first half
    foreach ($first_half as $i => $char) {

        // If current character is in the second half and we have not already seen it
        if (in_array($char, $second_half) and !in_array($char, $duplicates)) {
            #echo "<br>" . $first_value;

            // Keep track of it
            $duplicates[] = $char;
        }

    }

    // Calculate the score
    foreach ($duplicates as $i => $char) {
        $sum += array_search($char, $score);
    }

    #echo "<br>-------<br>";
}

echo "Sum of priorities of the duplicate items per rucksack : " . $sum;
echo "<br><br>";

// Part 2

$group = [];
$sum = 0;


foreach ($rucksacks as $rucksack) {
    $group[] = str_split($rucksack);

    // For each group of 3 rucksacks / array of characters
    if (count($group) == 3) {

        // Get the unique common characters of the 3 arrays using array_intersect
        $common_characters = array_unique(array_intersect($group[0], $group[1], $group[2]));
        assert(count($common_characters) == 1);

        // Keep track of the sum of priorities
        $sum += array_search(current($common_characters), $score);

        $group = [];
    }
}

echo "Sum of priorities of the elf badges : " . $sum;


?>