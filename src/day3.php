<a href=/adventofcode2022 /> Back to list </a> </br>
<style>
    <?php include '../style.css'; ?>
</style>

<?php

include("helpers.php");

$rucksacks = readLinesInInputFileAndCleanBasedOnRegex("../input/day3-rucksacks.txt", "/[^A-Za-z\d]/");
$score = str_split(" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");
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
    foreach ($duplicates as $i => $char) {
        $sum += array_search($char, $score);
    }

    #echo "<br>-------<br>";
}

echo "What is the sum of the priorities of those item types? Answer > " . $sum;

?>