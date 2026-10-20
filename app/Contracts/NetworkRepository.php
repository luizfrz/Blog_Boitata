<?php

namespace App\Contracts;

use App\Models\Network;
use Illuminate\Support\Collection;

interface NetworkRepository
{
    /** @return Collection<int, Network> */
    public function ordered(): Collection;
}
