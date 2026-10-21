<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Network;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SecurityTest extends TestCase
{
    use RefreshDatabase;

    public function test_article_html_is_sanitized(): void
    {
        Article::create([
            'title' => 'XSS', 'slug' => 'xss', 'is_published' => true, 'published_at' => now()->subDay(),
            'content' => '<p onclick="x()">ok</p><script>alert(1)</script><img src="x" onerror="alert(2)"><a href="javascript:alert(3)">link</a><strong>negrito</strong>',
        ]);

        $this->get('/artigos/xss')
            ->assertOk()
            ->assertSee('<strong>negrito</strong>', false)
            ->assertDontSee('<script>alert(1)', false)
            ->assertDontSee('onerror', false)
            ->assertDontSee('onclick', false)
            ->assertDontSee('javascript:', false);
    }

    public function test_network_links_only_allow_http_and_https(): void
    {
        Network::create(['name' => 'Ruim', 'url' => 'javascript:alert(1)']);
        Network::create(['name' => 'Bom', 'url' => 'https://github.com/x']);

        $this->get('/redes')->assertOk()->assertDontSee('javascript:', false)->assertSee('href="https://github.com/x"', false);
    }

    public function test_security_headers_are_sent_and_inline_script_uses_the_nonce(): void
    {
        $response = $this->get('/')->assertOk()
            ->assertHeader('X-Frame-Options', 'DENY')
            ->assertHeader('X-Content-Type-Options', 'nosniff');

        $csp = $response->headers->get('Content-Security-Policy');
        $this->assertStringContainsString("frame-ancestors 'none'", $csp);

        preg_match("/'nonce-([^']+)'/", $csp, $m);
        $this->assertNotEmpty($m[1]);
        $response->assertSee('nonce="'.$m[1].'"', false);
    }

    public function test_user_seeder_does_not_create_a_default_account(): void
    {
        config(['app.env' => 'testing']);
        putenv('ADMIN_EMAIL');
        putenv('ADMIN_PASSWORD');

        $this->seed(\Database\Seeders\UserSeeder::class);

        $this->assertDatabaseCount('users', 0);
    }
}
