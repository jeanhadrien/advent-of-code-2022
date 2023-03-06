<a href=/adventofcode2022 /> Back to list </a> </br>
<style>
    <?php include '../style.css'; ?>
</style>

<?php

include("helpers.php");

$pairs = readLinesInInputFileAndCleanBasedOnRegex("../input/day4-pairs.txt", "/[^\d,-]/");
$score = str_split(" abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ");

// Part 1

$count = 0;
foreach ($pairs as $pair) {

    // Parse the pairs of ranges
    $ranges = explode(",", $pair);
    $first_range = explode("-", current($ranges));
    next($ranges);
    $second_range = explode("-", current($ranges));

    // Test range inclusion in both ways
    if (
        ((int) $first_range[0] >= (int) $second_range[0] and (int) $first_range[1] <= (int) $second_range[1])
        or ((int) $second_range[0] >= (int) $first_range[0] and (int) $second_range[1] <= (int) $first_range[1])
    ) {
        $count += 1;
    }

}

echo "There are " . $count . " assignment pairs where one range fully contain the other";
echo "<br><br>";

// Part 2

$count = 0;

foreach ($pairs as $pair) {

    // Parse the pairs of ranges
    $ranges = explode(",", $pair);
    $first_range = explode("-", current($ranges));
    next($ranges);
    $second_range = explode("-", current($ranges));

    // Test range overlap
    // (If lower bound included in other range or higher bound included in other range, both ways)
    if (
        ((int) $first_range[0] >= (int) $second_range[0] and (int) $first_range[0] <= (int) $second_range[1])
        or ((int) $first_range[1] >= (int) $second_range[0] and (int) $first_range[0] <= (int) $second_range[1])
        or ((int) $second_range[0] >= (int) $first_range[0] and (int) $second_range[0] <= (int) $first_range[1])
        or ((int) $second_range[1] >= (int) $first_range[0] and (int) $second_range[0] <= (int) $first_range[1])
    ) {
        $count += 1;
    }

}
echo "There are " . $count . " assignment pairs with overlap";


?>