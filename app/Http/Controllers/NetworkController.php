<?php

namespace App\Http\Controllers;

use App\Contracts\NetworkRepository;
use Illuminate\Contracts\View\View;

class NetworkController extends Controller
{
    public function __invoke(NetworkRepository $networks): View
    {
        return view('blog.networks', ['networks' => $networks->ordered()]);
    }
}
