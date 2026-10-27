<?php

namespace Database\Seeders;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Database\Seeder;

class ContentSeeder extends Seeder
{
    public function run(): void
    {
        $types = [];
        foreach (['livros' => 'Livros', 'videos' => 'Vídeos', 'cursos' => 'Cursos'] as $slug => $name) {
            $types[$slug] = ContentType::firstOrCreate(['slug' => $slug], ['name' => $name, 'sort' => count($types) + 1]);
        }

        Content::firstOrCreate(['title' => 'Primeiros passos na mecânica quântica'], [
            'content_type_id' => $types['livros']->id,
            'author' => 'P. T. C. Feire e M. J. C. França',
            'description' => 'Editora Corsário, Fortaleza, 2019. 264 páginas.',
            'year' => 2019,
        ]);
    }
}
