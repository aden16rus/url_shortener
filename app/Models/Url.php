<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $fillable = ['full_url', 'is_expirable', 'short_code', 'expiration_delay'];
}
