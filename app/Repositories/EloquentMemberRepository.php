<?php

namespace App\Repositories;

use App\Contracts\MemberRepository;
use App\Models\Member;

class EloquentMemberRepository implements MemberRepository
{
    public function findBySlug(string $slug): Member
    {
        return Member::where('slug', $slug)->firstOrFail();
    }
}
