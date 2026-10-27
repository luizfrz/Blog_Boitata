<?php

namespace App\Providers;

use App\Contracts\ArticleRepository;
use App\Contracts\ContentRepository;
use App\Contracts\ContentTypeRepository;
use App\Contracts\HtmlSanitizer;
use App\Contracts\MemberRepository;
use App\Contracts\NetworkRepository;
use App\Repositories\EloquentArticleRepository;
use App\Repositories\EloquentContentRepository;
use App\Repositories\EloquentContentTypeRepository;
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
        ContentRepository::class => EloquentContentRepository::class,
        ContentTypeRepository::class => EloquentContentTypeRepository::class,
        HtmlSanitizer::class => PurifierHtmlSanitizer::class,
    ];
}
