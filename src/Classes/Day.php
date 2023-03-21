<?php

namespace App\Classes;

use Exception;

class Day
{
    public array $results = [];
    public function getInputFile(int $day, string $split_pattern = null, string $replace_pattern = null)
    {
        $content = AdventOfCodeScrapper::getInputFile($day);
        //echo json_encode($content);
        if ($split_pattern)
            $array = preg_split($split_pattern, $content);
        else
            $array = preg_split("/\n/", $content);

        if ($replace_pattern) {
            $array = array_map(function (string $string): string {
                global $replace_pattern;
                return preg_replace($replace_pattern, '', $string);
            }, $array);
        }
        return $array;

    }



    public function addResult(array $result)
    {
        if (array_keys($result) != ['type', 'answer', 'comment'])
            throw new Exception("can't add result without keys");
        $this->results[] = $result;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public static function getDay(int $day)
    {
        $class = 'App\Classes\Days\Day' . $day;
        return new $class();
    }
}


?>