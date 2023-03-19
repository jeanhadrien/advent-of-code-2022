<?php

namespace App\Classes\Days;

use App\Controller\Day;


class Day1 extends Day
{

    public function execute()
    {
        $lines = $this->getInputFile(1);

        // Part 1 : Find the elf with most calories, how many calories are they carrying ?

        $sum_current_elf_cal = 0;
        $elf_calories = [];
        foreach ($lines as $line) {
            // If empty line, save total for current elf and reset
            if ($line == "") {
                $elf_calories[] = $sum_current_elf_cal;
                $sum_current_elf_cal = 0;
            }

            // Keep track of the current elf total calories
            $cal = intval($line);
            $sum_current_elf_cal += intval($cal);
        }

        rsort($elf_calories);

        $this->addResult([
            "type" => "Calories carried by the top elf",
            "answer" => current($elf_calories),
            "comment" => "Elf calories in descending order : " . implode(", ", $elf_calories),
        ]);

        // Part 2 : Find the 3 top elf with most calories, how many calories are they carrying in total?

        $top3sum = 0;

        for ($i = 1; $i <= 3; $i++) {
            $top3sum += current($elf_calories);
            next($elf_calories);
        }

        $this->addResult([
            "type" => "Calories carried by the top 3 elves",
            "answer" => $top3sum,
            "comment" => ""
        ]);


    }


}