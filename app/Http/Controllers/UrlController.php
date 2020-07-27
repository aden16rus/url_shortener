<?php

namespace App\Http\Controllers;

use App\Services\UrlService;
use App\Http\Requests\UrlRequest;

class UrlController extends Controller
{

    protected $service;

    public function __construct(UrlService $service)
    {
        $this->service = $service;
    }

    public function store(UrlRequest $request)
    {
        $url = $this->service->storeUrl($request);
        return back()->with(['message' => 'Your short url: '. $url]);
    }
}
