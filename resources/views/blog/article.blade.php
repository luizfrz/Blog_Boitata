<x-layout :title="$article->title">
    <article>
        <x-meta>
            {{ $article->published_at?->format('d/m/Y') }}
            @if($article->category) · <x-badge>{{ $article->category->name }}</x-badge> @endif
        </x-meta>
        <x-page-title>{{ $article->title }}</x-page-title>

        @if($article->cover)
            <img src="{{ asset('storage/'.$article->cover) }}" alt="" class="my-4 aspect-[16/8] w-full rounded-xl object-cover">
        @endif

        <div class="prose prose-lg max-w-none dark:prose-invert prose-headings:text-head prose-a:text-brand dark:prose-headings:text-white dark:prose-a:text-brand-soft">{!! $article->content !!}</div>

        <p class="mt-8"><a href="{{ route('articles') }}" class="text-brand hover:underline dark:text-brand-soft">← Todos os artigos</a></p>
    </article>
</x-layout>
