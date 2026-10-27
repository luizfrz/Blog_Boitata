<?php

namespace App\Contracts;

use App\Models\Content;
use Illuminate\Support\Collection;

interface ContentRepository
{
    /** @return Collection<int, Content> publicados, opcionalmente só de um tipo (slug). */
    public function published(?string $typeSlug = null): Collection;
}
