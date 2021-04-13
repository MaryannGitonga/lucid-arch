<?php

namespace App\Domains\Recipe\Jobs;

use Lucid\Units\Job;
use App\Data\Models\Recipe;
use App\Data\Values\Ingredient;
use App\Data\Collections\IngredientsCollection;

class ParseIngredientsJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(private string $ingredients)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle():IngredientsCollection
    {
        $ingredients = new IngredientsCollection();

        foreach (array_filter(explode("\r\n", $this->ingredients)) as $line) {
            $ingredient = new Ingredient(...explode(',', $line));
            $ingredients->push($ingredient);
        }

        return $ingredients;
    }
}
