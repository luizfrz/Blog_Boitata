<?php

namespace App\Http\Controllers;

use App\Contracts\ArticleRepository;
use Illuminate\Contracts\View\View;

class ArticleController extends Controller
{
    private const PER_PAGE = 9;

    public function __construct(private readonly ArticleRepository $articles) {}

    public function index(): View
    {
        return view('blog.articles', ['articles' => $this->articles->paginatePublished(self::PER_PAGE)]);
    }

    public function show(string $slug): View
    {
        return view('blog.article', ['article' => $this->articles->findPublishedBySlug($slug)]);
    }
}
