<x-layout title="Redes">
    <x-page-title>Redes</x-page-title>
    <x-meta>Onde encontrar o Boitatá.</x-meta>

    <div class="mt-5 grid gap-4">
        @forelse($networks as $network)
            <x-card hover>
                <a href="{{ $network->url }}" target="_blank" rel="noopener" class="flex items-center gap-3.5 font-medium text-head dark:text-white">
                    <svg viewBox="0 0 16 16" aria-hidden="true" class="size-7 shrink-0 fill-brand dark:fill-brand-soft">
                        @if($network->icon === 'github')
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                        @else
                            <path d="M9 1h6v6h-1.5V3.56L7.53 9.53 6.47 8.47l5.97-5.97H9V1zM2 3h5v1.5H3.5v8h8V9H13v5.5H2V3z"/>
                        @endif
                    </svg>
                    <span>{{ $network->name }}<x-meta class="font-normal">{{ $network->url }}</x-meta></span>
                </a>
            </x-card>
        @empty
            <x-meta>Em breve.</x-meta>
        @endforelse
    </div>
</x-layout>
