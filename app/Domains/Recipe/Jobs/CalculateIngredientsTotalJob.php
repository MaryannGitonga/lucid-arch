<?php

namespace App\Domains\Recipe\Jobs;

use Lucid\Units\Job;
use App\Data\Collections\IngredientsCollection;

class CalculateIngredientsTotalJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private IngredientsCollection $ingredients)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle():float
    {
        return $this->ingredients->sum('total');
    }
}
