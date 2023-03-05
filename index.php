<style>
    <?php include 'style.css'; ?>br {
        display: none;
    }
</style>
<?php

$title = [
    1 => "calorie counting",
    2 => "rock paper scissors",
    3 => "rucksack reorganization"
];

for ($i = 1; $i <= 30; $i++)
{
    echo "<a href=/adventofcode2022/src/day" . $i . ".php>day " . $i;
    if (array_key_exists($i, $title))
        echo " : " . $title[$i];
    echo "</a> </br>";
}
?>