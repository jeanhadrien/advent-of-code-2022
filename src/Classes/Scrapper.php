<?php
namespace App\Classes;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

/**
 * Summary of AdventOfCodeScrapper
 */
class AdventOfCodeScrapper
{
    private static $titles, $client;
    private static function getClient()
    {
        return new \Goutte\Client;
    }

    public static function getTitles()
    {
        $titles = [];
        for ($i = 1; $i <= 25; $i++) {
            $crawler = self::getClient()->request('GET', 'https://adventofcode.com/2022/day/' . strval($i));
            $result = $crawler->evaluate('//html/body/main/article[1]/h2');
            foreach ($result as $t) {
                $titles[] = $t->textContent;
            }

        }
        return $titles;
    }

    public static function getInputFile(int $day)
    {
        // prerequisite, ssl setup : https://stackoverflow.com/questions/29822686/curl-error-60-ssl-certificate-unable-to-get-local-issuer-certificate

        $client = new Client();
        $headers = [
            'authority' => 'adventofcode.com',
            'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
            'accept-language' => 'en-US,en;q=0.9',
            'cache-control' => 'max-age=0',
            'cookie' => $_ENV["ADVENTOFCODE_SESSION"],
            'dnt' => '1',
            'sec-ch-ua' => '"Not=A?Brand";v="8", "Chromium";v="110", "Opera";v="96"',
            'sec-ch-ua-mobile' => '?0',
            'sec-ch-ua-platform' => '"Windows"',
            'sec-fetch-dest' => 'document',
            'sec-fetch-mode' => 'navigate',
            'sec-fetch-site' => 'none',
            'sec-fetch-user' => '?1',
            'upgrade-insecure-requests' => '1',
            'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36 OPR/96.0.0.0'
        ];
        $request = new Request('GET', 'https://adventofcode.com/2022/day/'.$day.'/input', $headers);
        $res = $client->sendAsync($request)->wait();
        return $res->getBody();
    }



}

?>