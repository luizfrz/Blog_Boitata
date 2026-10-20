<?php

namespace App\Contracts;

use App\Models\Member;

interface MemberRepository
{
    public function findBySlug(string $slug): Member;
}
