<?php

namespace App\Classes\Days;
use App\Classes\Day;

class Day2 extends Day
{

    static function isWin($me, $other)
    {
        if (self::$wins[$me] == $other)
            return true;
        return false;
    }

    static function isDraw($me, $other)
    {
        if (self::$draws[$me] == $other) {
            return true;
        }
        return false;
    }

    static function getShapeScore($me)
    {
        if ($me == "X") {
            return 1;
        } elseif ($me == "Y") {
            return 2;
        }
        return 3;
    }

    static function getOutcomeScore($me, $other)
    {
        if (self::isWin($me, $other))
            return 6;
        if (self::isDraw($me, $other))
            return 3;
        return 0;
    }

    static function getTotalScore($me, $other)
    {
        return self::getShapeScore($me) + self::getOutcomeScore($me, $other);
    }


    static function getMoveToPlay($goal, $other)
    {
        if ($goal == "X") // want to lose
            return array_search($other, self::$losses);
        if ($goal == "Y") // want to draw
            return array_search($other, self::$draws);
        if ($goal == "Z") // want to win
            return array_search($other, self::$wins);
    }

    static $wins = array("X" => "C", "Y" => "A", "Z" => "B");

    static $draws = array("X" => "A", "Y" => "B", "Z" => "C");

    static $losses = array("X" => "B", "Y" => "C", "Z" => "A", );

    public function execute()
    {

        $lines = $this->getInputFile(2);

        // Part 1 : Calculate the total score when XYZ are the moves I play during the round.

        $total = 0;
        foreach ($lines as $line) {

            // Get round moves for each player
            $line = preg_replace("/[^A-Za-z]/", '', $line);
            if (!$line)
                continue;
            $moves = str_split($line);
            $other = current($moves);
            next($moves);
            $me = current($moves);

            // Calculate round score based on played moves
            $roundScore = self::getTotalScore($me, $other);

            // Keep track of the total
            $total += $roundScore;
        }

        $this->addResult([
            "type" => "Total score when XYZ are the moves I play during the round",
            "answer" => $total,
            "comment" => "",
        ]);


        // Part 2 : Calculate the total score when XYZ are desired outcomes of the rounds.

        $total = 0;
        foreach ($lines as $line) {

            // Get round moves for each player
            $line = preg_replace("/[^A-Za-z]/", '', $line);
            if (!$line)
            continue;
            $moves = str_split($line);
            $other = current($moves);
            next($moves);
            $goal = current($moves);
            $me = self::getMoveToPlay($goal, $other);

            // Calculate round score based on played moves
            $roundScore = self::getTotalScore($me, $other);

            // Keep track of the total
            $total += $roundScore;
        }

        $this->addResult([
            "type" => "Total score when XYZ are desired outcomes of the rounds",
            "answer" => $total,
            "comment" => ""
        ]);


    }


}