<?php

namespace App\Repositories;

use App\Contracts\NetworkRepository;
use App\Models\Network;
use Illuminate\Support\Collection;

class EloquentNetworkRepository implements NetworkRepository
{
    public function ordered(): Collection
    {
        return Network::orderBy('sort')->get();
    }
}
