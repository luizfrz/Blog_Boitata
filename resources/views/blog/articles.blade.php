<x-layout title="Artigos">
    <x-page-title>Artigos</x-page-title>
    <x-meta>Pesquisas, estudos e notas do Boitatá.</x-meta>

    <div class="mt-5 grid gap-4">
        @forelse($articles as $article)
            <x-article-card :article="$article" />
        @empty
            <x-meta>Nenhum artigo publicado ainda.</x-meta>
        @endforelse
    </div>

    <div class="mt-6">{{ $articles->links() }}</div>
</x-layout>
