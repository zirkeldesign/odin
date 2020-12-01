<?php

namespace App\Jobs;

use App\Website;
use App\CrawledPage;
use Illuminate\Bus\Queueable;
use App\Checkers\BrowserConsole;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class BrowserConsoleCheck implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * @var CrawledPage
     */
    private $page;

    /**
     * @var Website
     */
    private $website;

    /**
     * Create a new job instance.
     *
     * @param Website $website
     * @param CrawledPage $page
     */
    public function __construct(Website $website, CrawledPage $page)
    {
        $this->page = $page;
        $this->website = $website;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $checker = new BrowserConsole($this->website, $this->page);
        $checker->run();
    }
}
