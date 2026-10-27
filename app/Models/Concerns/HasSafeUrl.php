<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait HasSafeUrl
{
    /** URL pronta para href: qualquer esquema que não seja http(s) (ex.: javascript:) vira "#". */
    protected function safeUrl(): Attribute
    {
        return Attribute::get(fn () => $this->onlyWebUrl($this->url));
    }

    protected function onlyWebUrl(?string $url): string
    {
        $scheme = strtolower((string) parse_url((string) $url, PHP_URL_SCHEME));

        return in_array($scheme, ['http', 'https'], true) ? $url : '#';
    }
}
