<?php

namespace App\Domains\Link\Jobs;

use Lucid\Units\Job;
use App\Data\Models\Link;

class SaveLinkJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */

    public function __construct(private string $url, private string $title, private string $description)
    {

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $attributes = [
            'url' => $this->url,
            'title' => $this->title,
            'description' => $this->description,
        ];

        return tap(new Link($attributes))->save();
    }
}
