<?php

namespace Tests\Feature;

use App\Contracts\ArticleRepository;
use App\Models\Article;
use App\Models\Member;
use App\Models\Network;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Support\Collection;
use Tests\TestCase;

class BlogPagesTest extends TestCase
{
    use RefreshDatabase;

    private function article(array $attributes = []): Article
    {
        return Article::create($attributes + [
            'title' => 'Redes neurais',
            'slug' => 'redes-neurais',
            'content' => '<p>conteúdo</p>',
            'is_published' => true,
            'published_at' => now()->subDay(),
        ]);
    }

    public function test_home_lists_published_articles_only(): void
    {
        $this->article();
        $this->article(['title' => 'Rascunho', 'slug' => 'rascunho', 'is_published' => false]);

        $this->get('/')->assertOk()->assertSee('Redes neurais')->assertDontSee('Rascunho');
    }

    public function test_article_page_and_404_for_unpublished(): void
    {
        $this->article();
        $this->article(['slug' => 'futuro', 'published_at' => now()->addDay()]);

        $this->get('/artigos/redes-neurais')->assertOk()->assertSee('conteúdo', false);
        $this->get('/artigos/futuro')->assertNotFound();
    }

    public function test_member_and_network_pages(): void
    {
        Member::create(['name' => 'Ana', 'slug' => 'ana', 'group' => 'curumim']);
        Network::create(['name' => 'GitHub', 'url' => 'https://github.com/x', 'icon' => 'github']);

        $this->get('/equipe/ana')->assertOk()->assertSee('Ana');
        $this->get('/equipe/inexistente')->assertNotFound();
        $this->get('/networking')->assertOk()->assertSee('https://github.com/x');
    }

    public function test_admin_and_team_index_are_not_exposed(): void
    {
        $this->get('/admin')->assertNotFound();
        $this->get('/equipe')->assertNotFound();
    }

    public function test_controllers_depend_on_the_contract_not_on_eloquent(): void
    {
        $this->app->bind(ArticleRepository::class, fn () => new class implements ArticleRepository {
            public function latestPublished(int $limit): Collection
            {
                return collect([new Article(['title' => 'Vindo do fake', 'slug' => 'fake', 'published_at' => now()])]);
            }

            public function paginatePublished(int $perPage): LengthAwarePaginator
            {
                return new Paginator([], 0, $perPage);
            }

            public function findPublishedBySlug(string $slug): Article
            {
                return new Article(['title' => 'x']);
            }
        });

        $this->get('/')->assertOk()->assertSee('Vindo do fake');
    }
}
