@props(['article'])
<x-card hover class="space-y-1.5">
    @if($article->cover)
        <img src="{{ asset('storage/'.$article->cover) }}" alt="" class="mb-2.5 aspect-[16/8] w-full rounded-xl object-cover">
    @endif
    <x-meta>
        {{ $article->published_at?->format('d/m/Y') }}
        @if($article->category) · <x-badge>{{ $article->category->name }}</x-badge> @endif
    </x-meta>
    <h2 class="text-xl font-bold leading-snug">
        <a href="{{ route('article', $article->slug) }}" class="text-head transition hover:text-brand dark:text-white dark:hover:text-brand-soft">{{ $article->title }}</a>
    </h2>
    <p class="text-slate-600 dark:text-slate-300">{{ $article->excerpt }}</p>
</x-card>
