<?php

namespace App\Support;

use Goutte\Client;
use App\Models\Article;

/**
 * Scrapper
 * 
 * Scrapper class service container is the handler
 * for the ScrapeData command class
 */
class Scrapper 
{

    /**
     * @return String
     * 
     * Function scrapes data from the spiel_url
     * will check if the found article is already stored in DB
     * If not the article is added to the DB via the Article model
     * 
     */
    public function scrape()
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

            //get date when post has author image
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

            //check if article has already been stored
            $is_already_stored = Article::where($article)->count();
            if($is_already_stored == 0){
                $article = Article::create($article);
                return $article;
            }

        });

        $article_count = count(array_filter($articles, function($x) { return !empty($x); }));
        return "Task complete: {$article_count} new articles have been saved";
    }

}