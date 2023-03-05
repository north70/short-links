<?php

namespace Tests;

use App\Domain\Users\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComponentTestCase extends TestCase
{
    use DatabaseTransactions;

    public function sighIn(User $user = null): User
    {
        $user = $user ?? User::factory()->create();
        $this->actingAs($user, 'api');

        return $user;
    }
}
