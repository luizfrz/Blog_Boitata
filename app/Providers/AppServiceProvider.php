<?php

namespace App\Providers;

use App\Contracts\ArticleRepository;
use App\Contracts\HtmlSanitizer;
use App\Contracts\MemberRepository;
use App\Contracts\NetworkRepository;
use App\Repositories\EloquentArticleRepository;
use App\Repositories\EloquentMemberRepository;
use App\Repositories\EloquentNetworkRepository;
use App\Support\PurifierHtmlSanitizer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** Contrato => implementação. Trocar a fonte de dados é mudar uma linha aqui. */
    public array $bindings = [
        ArticleRepository::class => EloquentArticleRepository::class,
        MemberRepository::class => EloquentMemberRepository::class,
        NetworkRepository::class => EloquentNetworkRepository::class,
        HtmlSanitizer::class => PurifierHtmlSanitizer::class,
    ];
}
