<?php

namespace App\Domain\Links\Models\Factories;

use App\Domain\Links\Models\Link;
use Illuminate\Database\Eloquent\Factories\Factory;

class LinkFactory extends Factory
{
    protected $model = Link::class;

    public function definition()
    {
        return [
            'origin_url' => $this->faker->url,
            'short_url' => $this->faker->numerify('########'),
            'expired_at' => $this->faker->dateTime,
        ];
    }
}