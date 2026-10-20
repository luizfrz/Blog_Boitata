<?php

namespace App\Providers;

use App\Contracts\ArticleRepository;
use App\Contracts\MemberRepository;
use App\Contracts\NetworkRepository;
use App\Repositories\EloquentArticleRepository;
use App\Repositories\EloquentMemberRepository;
use App\Repositories\EloquentNetworkRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** Contrato => implementação. Trocar a fonte de dados é mudar uma linha aqui. */
    public array $bindings = [
        ArticleRepository::class => EloquentArticleRepository::class,
        MemberRepository::class => EloquentMemberRepository::class,
        NetworkRepository::class => EloquentNetworkRepository::class,
    ];
}
