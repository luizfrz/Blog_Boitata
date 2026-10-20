<x-layout :title="$member->name">
    <div class="mb-5 flex items-center gap-4">
        <x-avatar :member="$member" size="size-21 text-3xl" />
        <div>
            <x-page-title>{{ $member->name }}</x-page-title>
            <x-meta>{{ $member->role }}</x-meta>
        </div>
    </div>

    <x-card class="prose max-w-none dark:prose-invert prose-headings:text-head dark:prose-headings:text-white">
        {!! $member->bio ?: '<p>Perfil em breve.</p>' !!}
    </x-card>

    <p class="mt-6"><a href="{{ route('home') }}" class="text-brand hover:underline dark:text-brand-soft">← Início</a></p>
</x-layout>
