<x-layout>
    <section class="pb-9 pt-7">
        <span class="inline-block rounded-full border border-line bg-white px-3 py-0.5 text-[13px] font-bold uppercase tracking-widest text-brand dark:border-night-line dark:bg-night-card dark:text-brand-soft">Grupo de pesquisa em ciência de dados</span>
        <p class="mb-5 mt-4 max-w-2xl text-xl text-slate-600 dark:text-slate-300">o boitatá tem como objetivo investigar ciência de dados e aplicar em problemas do mundo real; discutir cibercultura, cafés e a nossa cidade, Fortaleza, iracema banhada pelo mar e ver a praia do futuro no pôr-do-sol.</p>

        <x-button :href="route('articles')" primary>Ler os artigos</x-button>
    </section>

    <x-section-title>Últimos artigos</x-section-title>
    <div class="grid gap-4">
        @forelse($articles as $article)
            <x-article-card :article="$article" />
        @empty
            <x-meta>Nenhum artigo publicado ainda.</x-meta>
        @endforelse
    </div>
</x-layout>
