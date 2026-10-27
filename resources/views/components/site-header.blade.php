<header class="sticky top-0 z-10 border-b border-line bg-white/80 backdrop-blur dark:border-night-line dark:bg-night/80">
    <nav class="mx-auto flex max-w-4xl flex-wrap items-center gap-1.5 px-5 py-2.5">
        <a href="{{ route('home') }}" aria-label="Boitatá Lab — início" class="mr-auto leading-none">
            <img src="{{ asset('img/logo-text.png') }}" alt="Boitatá Lab" class="h-14 w-auto rounded-lg md:h-16 dark:bg-white dark:px-2">
        </a>

        <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Início</x-nav-link>
        <x-nav-link :href="route('articles')" :active="request()->routeIs('article*')">Artigos</x-nav-link>
        <x-nav-link :href="route('contents')" :active="request()->routeIs('contents')">Conteúdos</x-nav-link>
        <x-nav-link :href="route('networks')" :active="request()->routeIs('networks')">Redes</x-nav-link>

        <x-theme-toggle />
    </nav>
</header>
