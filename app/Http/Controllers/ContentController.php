<?php

namespace App\Http\Controllers;

use App\Contracts\ContentRepository;
use App\Contracts\ContentTypeRepository;
use Illuminate\Contracts\View\View;

class ContentController extends Controller
{
    public function __invoke(ContentRepository $contents, ContentTypeRepository $types, ?string $type = null): View
    {
        $available = $types->withPublishedContents();

        abort_if($type !== null && ! $available->contains('slug', $type), 404);

        return view('blog.contents', [
            'types' => $available,
            'current' => $type,
            'contents' => $contents->published($type),
        ]);
    }
}
