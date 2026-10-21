<?php

namespace App\Contracts;

interface HtmlSanitizer
{
    /** Devolve HTML seguro para exibir: só tags de formatação, sem scripts nem atributos de evento. */
    public function clean(?string $html): string;
}
