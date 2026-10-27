<?php

namespace Tests\Feature;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContentsTest extends TestCase
{
    use RefreshDatabase;

    public function test_lists_published_contents_and_filters_by_type(): void
    {
        $livros = ContentType::create(['name' => 'Livros', 'slug' => 'livros']);
        $videos = ContentType::create(['name' => 'Vídeos', 'slug' => 'videos']);
        Content::create(['title' => 'Livro A', 'content_type_id' => $livros->id, 'url' => 'https://exemplo.com/a']);
        Content::create(['title' => 'Video B', 'content_type_id' => $videos->id]);
        Content::create(['title' => 'Rascunho C', 'content_type_id' => $livros->id, 'is_published' => false]);

        $this->get('/conteudos')->assertOk()->assertSee('Livro A')->assertSee('Video B')->assertDontSee('Rascunho C');
        $this->get('/conteudos/livros')->assertOk()->assertSee('Livro A')->assertDontSee('Video B');
        $this->get('/conteudos/inexistente')->assertNotFound();
    }

    public function test_content_links_only_allow_http_and_https(): void
    {
        Content::create(['title' => 'Ruim', 'url' => 'javascript:alert(1)']);

        $this->get('/conteudos')->assertOk()->assertDontSee('javascript:', false);
    }

    public function test_pdf_link_is_shown_as_download_button_and_only_for_web_urls(): void
    {
        Content::create(['title' => 'Com PDF', 'pdf_url' => 'https://exemplo.com/livro.pdf']);
        Content::create(['title' => 'PDF ruim', 'pdf_url' => 'javascript:alert(1)']);

        $this->get('/conteudos')->assertOk()
            ->assertSee('href="https://exemplo.com/livro.pdf"', false)
            ->assertSee('Baixar PDF')
            ->assertDontSee('javascript:', false);
    }
}
