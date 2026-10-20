@props(['title' => null])
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ? $title.' — ' : '' }}Boitatá Lab</title>
    <link rel="icon" href="{{ asset('images/logo.png') }}">
    <link href="https://fonts.bunny.net/css?family=fira-sans:300,400,500,700" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- aplica o tema antes de pintar, evitando flash --}}
    <script>
        try { document.documentElement.dataset.theme = localStorage.getItem('theme') || (matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light') } catch (e) { document.documentElement.dataset.theme = 'light' }
    </script>
    <script src="{{ asset('js/theme.js') }}" defer></script>
</head>
<body class="relative min-h-screen bg-white font-sans text-[17px] leading-relaxed text-ink dark:bg-night dark:text-slate-200">
    <div class="absolute inset-x-0 top-0 -z-10 h-[520px] bg-linear-to-b from-sky-wash to-transparent dark:from-night-2"></div>

    <x-site-header />

    <main class="mx-auto max-w-4xl px-5 pb-20 pt-11">{{ $slot }}</main>

    <footer class="border-t border-line bg-white py-7 text-sm text-slate-500 dark:border-night-line dark:bg-night-card dark:text-slate-400">
        <div class="mx-auto max-w-4xl px-5">Boitatá Lab — grupo de estudo em Ciência de Dados · Fortaleza, CE · desde 2019</div>
    </footer>
</body>
</html>
