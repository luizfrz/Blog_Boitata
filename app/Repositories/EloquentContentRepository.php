<?php

namespace App\Repositories;

use App\Contracts\ContentRepository;
use App\Models\Content;
use Illuminate\Support\Collection;

class EloquentContentRepository implements ContentRepository
{
    public function published(?string $typeSlug = null): Collection
    {
        return Content::published()
            ->with('type')
            ->when($typeSlug, fn ($query) => $query->whereHas('type', fn ($type) => $type->where('slug', $typeSlug)))
            ->orderBy('sort')
            ->orderByDesc('year')
            ->get();
    }
}
