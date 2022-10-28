<?php

namespace App\Console\Commands;

use App\Support\Scrapper;
use Illuminate\Console\Command;

class ScrapeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scrape:spiegel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Spiegel.de web scrapper';

    /**
     * Execute the console command.
     * 
     * @var class Scrapper
     * @return int
     */
    public function handle(Scrapper $scrapper)
    {
        $scrapper->scrape();
        return Command::SUCCESS;
    }
}
