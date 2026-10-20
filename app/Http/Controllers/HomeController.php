<?php

namespace App\Http\Controllers;

use App\Contracts\ArticleRepository;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    private const LATEST_ARTICLES = 6;

    public function __invoke(ArticleRepository $articles): View
    {
        return view('blog.home', ['articles' => $articles->latestPublished(self::LATEST_ARTICLES)]);
    }
}
