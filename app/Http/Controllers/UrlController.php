<?php

namespace App\Http\Controllers;

use App\Models\Url;
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

    public function redirect($short_code)
    {
        $url = Url::whereShortCode($short_code)->first();
        if($url && !$url->isExpired()) {
            return redirect($url->full_url);
        }

        return redirect(route('index'))->with(['error' => 'Url not found']);
    }
}
