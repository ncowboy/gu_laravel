<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\NewsParseService;

class NewsParsing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $category_id;
    private $author_id;

    /**
     * NewsParsing constructor.
     * @param $category_id
     */
    public function __construct($category_id, $author_id)
    {
        $this->category_id = $category_id;
        $this->author_id = $author_id;
    }

    /**
     * @param NewsParseService $service
     */
    public function handle(NewsParseService $service)
    {
        $service->addNewsFromRss($this->category_id, $this->author_id);
    }
}
