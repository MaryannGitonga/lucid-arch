<?php

namespace App\Http\Controllers;

use Lucid\Units\Controller;
use App\Features\AddLinkFeature;

class LinkController extends Controller
{
    public function add()
    {
        return $this->serve(AddLinkFeature::class);
    }
}
