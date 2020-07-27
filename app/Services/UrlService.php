<?php

namespace App\Services;

use App\Models\Url;
use App\Services\BaseIntEncoder;

class UrlService
{
    protected $urlModel;

    public function __construct(Url $urlModel)
    {
        $this->urlModel = $urlModel;
    }

    /**
     * Store user request and generate short link
     *
     * @param mixed $request
     *
     * @return string
     */
    public function storeUrl($request)
    {
        $url = new Url();
        $url->full_url = sanitize_url($request->full_url);
        $url->is_expirable = $request->is_expirable;

        if ($request->is_expirable) {
            $url->expiration_delay = getExpirationTime($request->expiration_delay);
        }

        $url->save();

        $url->short_code = $this->generateCode($url->id);
        $url->save();

        return $this->generateShortUrl($url);
    }

	/**
     * Generate short hash by id
     *
	 * @param mixed $id
	 *
	 * @return string
	 */
	public function generateCode($id)
	{
        $wideId = strrev(str_pad($id, 6, "0", STR_PAD_LEFT));
        return BaseIntEncoder::encode($wideId);
	}

	/**
     * Concatenate final short url
     *
	 * @param Url $url
	 *
	 * @return string
	 */
	public function generateShortUrl($url)
	{
		return request()->getHost(). '/' . $url->short_code;
	}
}
