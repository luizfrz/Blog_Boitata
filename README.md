<p align="center">
  <img src="public/img/logo-text.png" width="420" alt="Boitatá Lab">
</p>

<p align="center">

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.3+-777BB4?logo=php&logoColor=white" alt="PHP 8.3+">
  <img src="https://img.shields.io/badge/Laravel-13-FF2D20?logo=laravel&logoColor=white" alt="Laravel 13">
  <img src="https://img.shields.io/badge/Tailwind_CSS-4-06B6D4?logo=tailwindcss&logoColor=white" alt="Tailwind CSS 4">
  <img src="https://img.shields.io/badge/SQLite-003B57?logo=sqlite&logoColor=white" alt="SQLite">
</p>

## Sobre

O **Boitatá** investiga ciência de dados e a aplica em problemas do mundo real, além de discutir cibercultura, cafés e a nossa cidade, Fortaleza — Iracema banhada pelo mar, com a Praia do Futuro ao pôr-do-sol.

Este repositório contém o blog do grupo, onde publicamos artigos, apresentamos a equipe e listamos os nossos canais de networking.

## Funcionalidades

- **Artigos** — listagem e leitura de artigos organizados por categoria (`/artigos`, `/artigos/{slug}`).
- **Equipe** — página de perfil para cada membro do grupo (`/equipe/{slug}`).
- **Networking** — links para as redes e comunidades do grupo (`/networking`).
- **Tema claro/escuro** — alternância de tema pelo cabeçalho.
- **Conteúdo seguro** — HTML dos artigos sanitizado com HTML Purifier, com testes cobrindo XSS e cabeçalhos CSP.

## Tecnologias

- [Laravel](https://laravel.com) 13 (PHP 8.3+)
- [Tailwind CSS](https://tailwindcss.com) 4 com [Vite](https://vite.dev)
- SQLite (padrão)
- [HTML Purifier](http://htmlpurifier.org) para sanitização
- PHPUnit e Laravel Pint

## Como rodar

Requisitos: PHP 8.3+, Composer e Node.js.

```bash
git clone https://github.com/BoitataLabs/Boitat--blog.git
cd Boitat--blog

composer setup                 # instala dependências, gera a chave, migra e compila os assets
php artisan db:seed            # popula artigos, equipe e redes de exemplo
composer dev                   # sobe o servidor de desenvolvimento
```

O blog ficará disponível em `http://localhost:8000`.

## Testes

```bash
composer test
```

## Estrutura

| Caminho | Conteúdo |
| --- | --- |
| `app/Models` | `Article`, `Category`, `Member`, `Network` |
| `app/Http/Controllers` | Controllers das páginas do blog |
| `resources/views/blog` | Páginas (home, artigos, membro, networking) |
| `resources/views/components` | Componentes Blade reutilizáveis |
| `database/seeders` | Dados iniciais |
| `tests/Feature` | Testes de páginas e de segurança |


## Links

- GitHub: [BoitataLabs](https://github.com/BoitataLabs)
