<?php

namespace App\View\Components;

use App\Contracts\HtmlSanitizer;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/** Único lugar do site que imprime HTML vindo do banco, sempre depois de sanitizado. */
class RichText extends Component
{
    public string $clean;

    public function __construct(HtmlSanitizer $sanitizer, ?string $html = null)
    {
        $this->clean = $sanitizer->clean($html);
    }

    public function render(): View
    {
        return view('components.rich-text');
    }
}
