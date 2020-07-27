<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['full_url', 'is_expirable', 'short_code', 'expiration_delay'];

    public function isExpired()
    {
        if($this->is_expirable && $this->expired()) {
            return true;
        }
        return false;
    }

    private function expired()
    {
        return $this->expiration_delay < now()->timestamp;
    }
}

