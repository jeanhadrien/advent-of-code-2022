<?php

namespace App\Controller;

use App\Classes\AdventOfCodeScrapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Twig\Environment;

interface DayControllerInterface
{
    public function solvePartOne();

    public function solvePartTwo();

}

class Day
{

    public $day;
    public function getInputFile()
    {
        return AdventOfCodeScrapper::getInputFile($this->day);
    }

    public static function getDay(int $day)
    {
        $class = 'App\Classes\Days\Day' . $day;
        return new $class();
    }

}


?>