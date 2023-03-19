<?php

namespace App\Controller;

use App\Classes\AdventOfCodeScrapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Twig\Environment;


class DayController extends AbstractController
{
    #[Route('/day{id}', name: 'day')]
    public function day(int $id, Environment $twig, CacheInterface $cache): Response
    {
        $dayInstance = Day::getDay($id);

        return new Response($twig->render('day.html.twig', [
            'day' => $id,
            'partOne' => $dayInstance->solvePartOne(),
            'partTwo' => $dayInstance->solvePartTwo(),
        ]));
    }

}


?>