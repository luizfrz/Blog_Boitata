<?php

namespace App\Contracts;

use App\Models\ContentType;
use Illuminate\Support\Collection;

interface ContentTypeRepository
{
    /** @return Collection<int, ContentType> só os tipos que têm conteúdo publicado. */
    public function withPublishedContents(): Collection;
}
