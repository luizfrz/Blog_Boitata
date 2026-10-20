<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run(): void
    {
        $cat = Category::firstOrCreate(['slug' => 'o-grupo'], ['name' => 'O grupo']);

        Article::firstOrCreate(['slug' => 'boitata-lab-o-que-e'], [
            'category_id' => $cat->id,
            'title' => 'Boitatá Lab — o que é?',
            'excerpt' => 'Grupo de estudo em Ciência de Dados nascido em Fortaleza, Ceará, em março de 2019.',
            'content' => '<p>O Boitatá é um grupo de estudo em Ciência de Dados que surgiu em Fortaleza, no Ceará, em março de 2019. Tem como objetivo investigar os métodos matemáticos e computacionais relacionados à área de Inteligência Artificial.</p>'
                .'<h3>O que fez?</h3><ul><li>Análise de Resultados de AFM para detecção de ruídos</li><li>Análise Temporal de Tópicos em Música</li><li>Investigação em Linguagem Natural para o Reconhecimento de Entidades Nomeadas</li><li>Construção de Corpus de Medicamentos para o Português Brasileiro</li></ul>'
                .'<h3>O nascimento do Boitatá</h3><p>No final de 2018, num dos encontros dos eliEzer — clã formado por quatro físicos-poetas: Mardônio França, Daniel Brito, Lucas Miranda e Luan Misael —, na casa de Daniel Brito, conversava-se sobre poesia, cibercultura e ciência de dados quando Dani Wega propôs: "por que vocês não criam um grupo de pesquisa que mergulhe nesse tema tão em voga: a Ciência de Dados?". Assim surge o boitatabrazil.</p>'
                .'<p>O grupo investiga ciência de dados e aplica em problemas do mundo real; discute cibercultura, cafés e a nossa cidade, Fortaleza, Iracema banhada pelo mar, vendo a Praia do Futuro no pôr-do-sol.</p>',
            'is_published' => true,
            'published_at' => now(),
        ]);
    }
}
