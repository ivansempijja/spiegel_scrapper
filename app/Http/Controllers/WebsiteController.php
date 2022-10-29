<?php

namespace App\Http\Controllers;

use Goutte\Client;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $client = new Client();
        $url = env('SPIEGEL_URL');

        $crawler = $client->request('GET', $url);
        $articles = $crawler->filter('article > div')->each(function ($node){
            //get title and link
            $title_link_array = $node->children('div > header > h2 > a')->each(function ($child){
                return [$child->attr('title'), $child->attr('href')];
            });

            //get date when post has no author image
            $date_array = $node->children('div > div > footer > span')->each(function ($child){
                    return [$child->text()];
            });

            //get data when post has author image
            $date_with_author_img = $node->children('div > footer > span')->each(function ($child){
                return [$child->text()];
            });

            //get except
            $except_array = $node->children('div > section > a > span')->each(function ($child){
                    return $child->text();
            });

            //get image link
            $image_link_array = $node->children('figure > div > a > div > picture > img')->each(function ($child){
                return $child->attr('data-src');
            });


            /**
             * if article has no image (incase of video, set image to null)
             * 
             * sugguested improvment: add image file type of video or image on
             * Article model to enable both vid and image
             * 
             */
            $article = [
                'title' => $title_link_array[0][0],
                'article_link' => $title_link_array[0][1],
                'image_url' => $image_link_array[0] ?? null,
                'excerpt' => implode($except_array),
                'article_date' => $date_array[0][0] ?? $date_with_author_img[0][0]
            ];
            
            return $article;
        });
    
    }
}
