<?php

namespace App\Controller;

use App\Classes\AdventOfCodeScrapper;
use Exception;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Twig\Environment;

class Day
{
    public array $results = [];
    public function getInputFile(int $day, string $split_pattern = null, string $remove_pattern = null)
    {
        $content = AdventOfCodeScrapper::getInputFile($day);
        //echo json_encode($content);
        if ($split_pattern) {
            return preg_split($split_pattern, $content);
        } else {
            return preg_split("/\n/", $content);
        }

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