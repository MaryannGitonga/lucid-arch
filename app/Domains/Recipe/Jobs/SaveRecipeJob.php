<?php

namespace App\Domains\Recipe\Jobs;

use Lucid\Units\Job;
use App\Models\User;
use App\Data\Models\Recipe;

class SaveRecipeJob extends Job
{
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        private string $title,
        private string $ingredients,
        private string $instructions,
        private string $price,
        private User $user)
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle():Recipe
    {
        $attributes = [
            'title' => $this->title,
            'ingredients' => $this->ingredients,
            'instructions' => $this->instructions,
            'price' => $this->price,
            'user_id' => $this->user->getKey(),
        ];

        return tap(new Recipe($attributes))->save();
    }
}
