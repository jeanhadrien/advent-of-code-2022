<?php
namespace App\Classes;


/**
 * Summary of AdventOfCodeScrapper
 */
class AdventOfCodeScrapper
{
    private static $titles;

    public static function getTitles()
    {
        $titles = [];
        $client = new \Goutte\Client;
        for ($i = 1; $i <= 25; $i++) {
            $crawler = $client->request('GET', 'https://adventofcode.com/2022/day/' . strval($i));
            $result = $crawler->evaluate('//html/body/main/article[1]/h2');
            foreach ($result as $t) {
                $titles[] = $t->textContent;
            }

        }
        return $titles;
    }


}

?>