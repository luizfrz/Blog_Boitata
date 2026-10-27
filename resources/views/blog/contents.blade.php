<x-layout title="Conteúdos">
    <x-page-title>Conteúdos</x-page-title>
    <x-meta>Livros, materiais e indicações do Boitatá.</x-meta>

    @if($types->isNotEmpty())
        <nav class="mt-5 flex flex-wrap gap-2" aria-label="Filtrar por tipo">
            <x-nav-link :href="route('contents')" :active="$current === null">Todos</x-nav-link>
            @foreach($types as $type)
                <x-nav-link :href="route('contents', $type->slug)" :active="$current === $type->slug">{{ $type->name }}</x-nav-link>
            @endforeach
        </nav>
    @endif

    <div class="mt-6 grid gap-4 sm:grid-cols-2">
        @forelse($contents as $content)
            <x-card hover class="flex flex-col gap-1.5">
                @if($content->cover)
                    <img src="{{ asset('storage/'.$content->cover) }}" alt="" class="mb-2 aspect-[4/3] w-full rounded-xl object-cover">
                @endif
                <x-meta>
                    @if($content->type)<x-badge>{{ $content->type->name }}</x-badge>@endif
                    {{ $content->year }}
                </x-meta>
                <h2 class="text-xl font-bold leading-snug text-head dark:text-white">{{ $content->title }}</h2>
                @if($content->author)<p class="text-sm text-slate-500 dark:text-slate-400">{{ $content->author }}</p>@endif
                @if($content->description)<p class="text-slate-600 dark:text-slate-300">{{ $content->description }}</p>@endif
                @if($content->safe_pdf_url !== '#' || $content->safe_url !== '#')
                    <div class="mt-auto flex flex-wrap items-center gap-x-4 gap-y-2 pt-3">
                        @if($content->safe_pdf_url !== '#')
                            <a href="{{ $content->safe_pdf_url }}" target="_blank" rel="noopener" class="inline-flex items-center gap-1.5 rounded-full bg-brand px-4 py-1.5 text-sm font-medium text-white transition hover:brightness-110 dark:bg-brand-soft dark:text-night">
                                <svg viewBox="0 0 20 20" aria-hidden="true" class="size-4 fill-current"><path d="M10 2a1 1 0 0 1 1 1v8.59l2.3-2.3a1 1 0 1 1 1.4 1.42l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 1 1 1.4-1.42L9 11.59V3a1 1 0 0 1 1-1zM4 16a1 1 0 0 1 1-1h10a1 1 0 1 1 0 2H5a1 1 0 0 1-1-1z"/></svg>
                                Baixar PDF
                            </a>
                        @endif
                        @if($content->safe_url !== '#')
                            <a href="{{ $content->safe_url }}" target="_blank" rel="noopener" class="text-sm font-medium text-brand hover:underline dark:text-brand-soft">Acessar →</a>
                        @endif
                    </div>
                @endif
            </x-card>
        @empty
            <x-meta>Nenhum conteúdo publicado ainda.</x-meta>
        @endforelse
    </div>
</x-layout>
