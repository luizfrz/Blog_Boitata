<x-layout>
    <section class="pb-9 pt-7">
        <span class="inline-block rounded-full border border-line bg-white px-3 py-0.5 text-[13px] font-bold uppercase tracking-widest text-brand dark:border-night-line dark:bg-night-card dark:text-brand-soft">Grupo de estudo · Ciência de Dados</span>
        <h1 class="mb-3 mt-3.5 text-[clamp(2rem,5.5vw,3.3rem)] font-bold leading-[1.1] tracking-tight text-head dark:text-white">Dados, ciência e poesia, direto de Fortaleza.</h1>
        <p class="mb-5 max-w-2xl text-lg text-slate-600 dark:text-slate-300">O Boitatá nasceu em março de 2019 para investigar os métodos matemáticos e computacionais da Inteligência Artificial e aplicá-los a problemas do mundo real, entre um café e um pôr-do-sol na Praia do Futuro.</p>

        <x-button :href="route('articles')" primary>Ler os artigos</x-button>

        <ul class="mt-2.5 flex flex-wrap gap-2.5 text-sm text-slate-600 dark:text-slate-300">
            @foreach(['📍 Fortaleza, CE', '🗓 Desde 2019', '🧠 IA & Ciência de Dados'] as $fact)
                <li class="rounded-full border border-line bg-white px-3 py-1 dark:border-night-line dark:bg-night-card">{{ $fact }}</li>
            @endforeach
        </ul>
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
