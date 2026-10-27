<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\NetworkController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

Route::get('/artigos', [ArticleController::class, 'index'])->name('articles');
Route::get('/artigos/{slug}', [ArticleController::class, 'show'])->name('article');

Route::get('/conteudos/{type?}', ContentController::class)->name('contents');

Route::get('/equipe/{slug}', [MemberController::class, 'show'])->name('member');

Route::get('/networking', NetworkController::class)->name('networks');
