<?php

namespace App\Support;

use App\Contracts\HtmlSanitizer;
use HTMLPurifier;
use HTMLPurifier_Config;

class PurifierHtmlSanitizer implements HtmlSanitizer
{
    private const ALLOWED = 'p,br,hr,strong,b,em,i,u,s,del,a[href|title],ul,ol,li,h2,h3,h4,blockquote,pre,code,div,span,img[src|alt]';

    private ?HTMLPurifier $purifier = null;

    public function clean(?string $html): string
    {
        return $html === null || $html === '' ? '' : $this->purifier()->purify($html);
    }

    private function purifier(): HTMLPurifier
    {
        if ($this->purifier) {
            return $this->purifier;
        }

        $cache = storage_path('framework/cache/htmlpurifier');
        is_dir($cache) || mkdir($cache, 0775, true);

        $config = HTMLPurifier_Config::createDefault();
        $config->set('Cache.SerializerPath', $cache);
        $config->set('HTML.Allowed', self::ALLOWED);
        $config->set('URI.AllowedSchemes', ['http' => true, 'https' => true, 'mailto' => true]);
        $config->set('HTML.TargetBlank', true);   // links externos abrem em nova aba com rel="noopener noreferrer"
        $config->set('HTML.Nofollow', true);

        return $this->purifier = new HTMLPurifier($config);
    }
}
