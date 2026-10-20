<?php

namespace App\Contracts;

use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticleRepository
{
    /** @return Collection<int, Article> */
    public function latestPublished(int $limit): Collection;

    public function paginatePublished(int $perPage): LengthAwarePaginator;

    public function findPublishedBySlug(string $slug): Article;
}
