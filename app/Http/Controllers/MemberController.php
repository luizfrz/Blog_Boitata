<?php

namespace App\Http\Controllers;

use App\Contracts\MemberRepository;
use Illuminate\Contracts\View\View;

class MemberController extends Controller
{
    public function show(MemberRepository $members, string $slug): View
    {
        return view('blog.member', ['member' => $members->findBySlug($slug)]);
    }
}
