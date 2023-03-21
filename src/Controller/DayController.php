<?php

namespace App\Controller;

use App\Classes\AdventOfCodeScrapper;
use App\Classes\Day;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Twig\Environment;


class DayController extends AbstractController
{
    #[Route('/day{id}', name: 'day')]
    public function day(int $id, Environment $twig, CacheInterface $cache, Request $request): Response
    {   
        $dayInstance = Day::getDay($id);
        $dayInstance->execute();

        return new JsonResponse([
            'day' => $id,
            'results' => $dayInstance->getResults(),
        ]);
        /*
        return new Response($twig->render('day.html.twig', [
            'day' => $id,
            'partOne' => $dayInstance->getPartOneAnswer(),
            'partTwo' => $dayInstance->getPartTwoAnswer(),
        ])); 
        */
    }

}


?>