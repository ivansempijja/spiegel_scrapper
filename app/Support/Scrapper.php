<?php

namespace App\Support;

use Goutte\Client;

class Scrapper 
{

    public function scrape()
    {
        $client = new Client();
        $url = env('SPIEGEL_URL');

        $crawler = $client->request('GET', $url);
        //dd($crawler->filter('article'));
    }
}