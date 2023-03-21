<?php

namespace App\Classes\Days;

use App\Classes\Day;
use App\Classes\Utils;
use Exception;

class Day4 extends Day
{
    public function execute()
    {
        $lines = $this->getInputFile(4, $replace_pattern = "/[^\d,-]/");

        $score = " " . Utils::getAlphabet() . Utils::getAlphabet($lowercase = False);
        $score = str_split($score);

        // Part 1

        $count = 0;
        foreach ($lines as $pair) {
            if (!$pair)
                continue;

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

        $this->addResult([
            "type" => "Count of assignment pairs where one range fully contain the other",
            "answer" => $count,
            "comment" => ""
        ]);

        // Part 2

        $count = 0;

        foreach ($lines as $pair) {
            if (!$pair)
                continue;
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
        $this->addResult([
            "type" => "Count of assignment pairs with overlapping range",
            "answer" => $count,
            "comment" => ""
        ]);


    }

}

?>