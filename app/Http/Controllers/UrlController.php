<?php

namespace App\Http\Controllers;

use App\Http\Requests\UrlRequest;

class UrlController extends Controller
{
    public function store(UrlRequest $request)
    {
        return back()->with(['message' => 'it works']);
    }
}
