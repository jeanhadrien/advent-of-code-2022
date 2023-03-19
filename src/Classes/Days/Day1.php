<?php

namespace App\Classes\Days;
use App\Controller\Day;
use App\Controller\DayControllerInterface;


class Day1 extends Day implements DayControllerInterface
{
    public $day = 1;
    public function solvePartOne()
    {
        $lines = self::getInputFile();
        return $lines;
    }
    
    public function solvePartTwo()
    {
        return "test";
    }

}