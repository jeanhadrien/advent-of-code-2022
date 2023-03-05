<a href=/adventofcode2022 /> Back to list </a> </br>
<style>
    <?php include '../style.css'; ?>
</style>

<?php

$wins = array("X" => "C", "Y" => "A", "Z" => "B");

function isWin($me, $other)
{
    global $wins;
    if ($wins[$me] == $other)
        return true;
    return false;
}

$draws = array("X" => "A", "Y" => "B", "Z" => "C");

function isDraw($me, $other)
{
    global $draws;
    if ($draws[$me] == $other) {
        return true;
    }
    return false;
}

function getShapeScore($me)
{
    if ($me == "X") {
        return 1;
    } elseif ($me == "Y") {
        return 2;
    }
    return 3;
}

function getOutcomeScore($me, $other)
{
    if (isWin($me, $other))
        return 6;
    if (isDraw($me, $other))
        return 3;
    return 0;
}

function getTotalScore($me, $other)
{
    return getShapeScore($me) + getOutcomeScore($me, $other);
}

// Part 1 : Calculate the total score when XYZ are the moves I play during the round.

$lines = file("../input/day2-input.txt");

$total = 0;
foreach ($lines as $line) {

    // Get round moves for each player
    $line = preg_replace("/[^A-Za-z]/", '', $line);
    $moves = str_split($line);
    $other = current($moves);
    next($moves);
    $me = current($moves);

    // Calculate round score based on played moves
    $roundScore = getTotalScore($me, $other);

    // Keep track of the total
    $total += $roundScore;
}

echo "Total score Part 1 : " . $total;
echo "<br><br>";

// Part 2 : Calculate the total score when XYZ are desired outcomes of the rounds.

$losses = array(
    "X" => "B",
    "Y" => "C",
    "Z" => "A",
);

function getMoveToPlay($goal, $other)
{
    global $wins, $losses, $draws;
    if ($goal == "X") // want to lose
        return array_search($other, $losses);
    if ($goal == "Y") // want to draw
        return array_search($other, $draws);
    if ($goal == "Z") // want to win
        return array_search($other, $wins);
}

$total = 0;
foreach ($lines as $line) {

    // Get round moves for each player
    $line = preg_replace("/[^A-Za-z]/", '', $line);
    $moves = str_split($line);
    $other = current($moves);
    next($moves);
    $goal = current($moves);
    $me = getMoveToPlay($goal, $other);

    // Calculate round score based on played moves
    $roundScore = getTotalScore($me, $other);

    // Keep track of the total
    $total += $roundScore;
}

echo "Total score Part 2 : " . $total;

?>