<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $guarded = [];

    /** URL pronta para href: qualquer esquema que não seja http(s) (ex.: javascript:) vira "#". */
    protected function safeUrl(): Attribute
    {
        return Attribute::get(
            fn () => in_array(strtolower((string) parse_url($this->url, PHP_URL_SCHEME)), ['http', 'https'], true) ? $this->url : '#'
        );
    }
}
