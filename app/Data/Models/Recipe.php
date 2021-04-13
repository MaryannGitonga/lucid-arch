<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['title', 'ingredients', 'instructions', 'price', 'user_id'];
}
