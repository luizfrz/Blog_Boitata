<?php

namespace App\Models;

use App\Models\Concerns\HasSafeUrl;
use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    use HasSafeUrl;

    protected $guarded = [];
}
