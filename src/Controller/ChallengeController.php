<?php
namespace App\Controller;

use App\Classes\AdventOfCodeScrapper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Twig\Environment;

class ChallengeController extends AbstractController
{

    private $cache;
    #[Route('/', name: 'homepage')]
    public function index(Environment $twig, CacheInterface $cache): Response
    {
        return new Response($twig->render('challenges.html.twig', [
            'challenges' => $cache->get('titles',function (ItemInterface $item){
                $item->expiresAfter(3600);
                return AdventOfCodeScrapper::getTitles();
            }),
            'result' => AdventOfCodeScrapper::$job
        ]));
    }
}

?>