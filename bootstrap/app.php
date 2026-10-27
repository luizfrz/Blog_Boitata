<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;

// Vercel's filesystem is read-only except for /tmp, so the framework's
// bootstrap caches (packages, services, ...) must be written there.
if (getenv('VERCEL') || isset($_ENV['VERCEL'])) {
    foreach ([
        'APP_PACKAGES_CACHE' => '/tmp/bootstrap/packages.php',
        'APP_SERVICES_CACHE' => '/tmp/bootstrap/services.php',
        'APP_CONFIG_CACHE' => '/tmp/bootstrap/config.php',
        'APP_ROUTES_CACHE' => '/tmp/bootstrap/routes.php',
        'APP_EVENTS_CACHE' => '/tmp/bootstrap/events.php',
    ] as $key => $path) {
        putenv("{$key}={$path}");
        $_ENV[$key] = $_SERVER[$key] = $path;
    }

    is_dir('/tmp/bootstrap') || mkdir('/tmp/bootstrap', 0775, true);
}

$app = Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->trustProxies(at: '*');
        // Site público: sem login nem formulários, então sem sessão, cookies ou CSRF (cada um custava uma ida ao banco).
        $middleware->web(
            remove: [
                \Illuminate\Cookie\Middleware\EncryptCookies::class,
                \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
                \Illuminate\Session\Middleware\StartSession::class,
                \Illuminate\View\Middleware\ShareErrorsFromSession::class,
                \Illuminate\Foundation\Http\Middleware\PreventRequestForgery::class,
            ],
            append: [
                \App\Http\Middleware\SecurityHeaders::class,
                \App\Http\Middleware\CachePublicPages::class,
            ],
        );
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        $exceptions->shouldRenderJsonWhen(
            fn (Request $request) => $request->is('api/*') || $request->expectsJson(),
        );
    })->create();

// Storage (views, sessions, logs, HTMLPurifier cache) also lives in /tmp.
if (getenv('VERCEL') || isset($_ENV['VERCEL'])) {
    $storage = '/tmp/storage';

    foreach (['app/public', 'framework/cache/data', 'framework/sessions', 'framework/views', 'logs'] as $dir) {
        is_dir("{$storage}/{$dir}") || mkdir("{$storage}/{$dir}", 0775, true);
    }

    $app->useStoragePath($storage);
}

return $app;
