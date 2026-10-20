<?php

namespace App\Repositories;

use App\Contracts\ArticleRepository;
use App\Models\Article;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class EloquentArticleRepository implements ArticleRepository
{
    public function latestPublished(int $limit): Collection
    {
        return $this->query()->limit($limit)->get();
    }

    public function paginatePublished(int $perPage): LengthAwarePaginator
    {
        return $this->query()->paginate($perPage);
    }

    public function findPublishedBySlug(string $slug): Article
    {
        return $this->query()->where('slug', $slug)->firstOrFail();
    }

    private function query(): Builder
    {
        return Article::published()->with('category')->latest('published_at');
    }
}
