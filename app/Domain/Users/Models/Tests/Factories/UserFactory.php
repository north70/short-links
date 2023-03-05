<?php

namespace App\Domain\Users\Models\Tests\Factories;

use App\Domain\Users\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        return [
            'email' => $this->faker->email,
            'name' => $this->faker->name,
            'password' => Hash::make($this->faker->password),
        ];
    }

    public function withPassword(string $password): Factory
    {
        return $this->state([
            'password' => Hash::make($password),
        ]);
    }
}
