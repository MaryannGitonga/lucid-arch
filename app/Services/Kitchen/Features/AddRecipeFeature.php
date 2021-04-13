<?php

namespace App\Services\Kitchen\Features;

use Lucid\Units\Feature;
use App\Domains\Recipe\Requests\AddRecipe;
use App\Services\Kitchen\Operations\CalculateRecipePriceOperation;
use Illuminate\Support\Facades\Auth;
use App\Domains\Http\Jobs\RedirectBackJob;
use App\Domains\Recipe\Jobs\SaveRecipeJob;

class AddRecipeFeature extends Feature
{
    public function handle(AddRecipe $request)
    {
        $price = $this->run(CalculateRecipePriceOperation::class, [
            'ingredients' => $request->input('ingredients'),
        ]);

        $this->run(SaveRecipeJob::class, [
            'title' => $request->input('title'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'price' => $price,
            'user' => Auth::user(),
        ]);

        return $this->run(RedirectBackJob::class);
    }
}
