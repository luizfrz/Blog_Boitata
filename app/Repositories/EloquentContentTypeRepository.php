<?php

namespace App\Repositories;

use App\Contracts\ContentTypeRepository;
use App\Models\ContentType;
use Illuminate\Support\Collection;

class EloquentContentTypeRepository implements ContentTypeRepository
{
    public function withPublishedContents(): Collection
    {
        return ContentType::whereHas('contents', fn ($query) => $query->published())
            ->orderBy('sort')
            ->get();
    }
}
