<style>
    a {
        display: block;
        width: 200px;
        max-width: 100%;
        padding: 10px;
        text-decoration: none;
        color: #333;
        background-color: #f2f2f2;
        border-radius: 5px;
        margin-bottom: 10px;
        font-family: Arial, sans-serif;
    }

    a:hover {
        background-color: #ddd;
    }

    br {
        display: none;
    }
</style>

<?php

$title = [
    1 => "calorie counting",
    2 => "rock paper scissors"
];

for ($i = 1; $i <= 30; $i++) {
    echo "<a href=/adventofcode2022/day" . $i . ".php>day " . $i;
    if (array_key_exists($i, $title))
        echo " : " . $title[$i];
    echo "</a> </br>";
}
?>