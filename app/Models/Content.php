<?php

namespace App\Models;

use App\Models\Concerns\HasSafeUrl;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    use HasSafeUrl;

    protected $guarded = [];

    protected $casts = ['is_published' => 'boolean'];

    public function type(): BelongsTo
    {
        return $this->belongsTo(ContentType::class, 'content_type_id');
    }

    /** Link do PDF pronto para href (só http/https; senão "#"). */
    protected function safePdfUrl(): Attribute
    {
        return Attribute::get(fn () => $this->onlyWebUrl($this->pdf_url));
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
