<?php

namespace App\Domain\Links\Actions;

use App\Domain\Links\Models\Link;
use Illuminate\Support\Str;

class GenerateShortLinkAction
{
    public function execute(string $originUrl): string
    {
        $shortUrl = str_shuffle(Str::random(8));

        $this->createModel($originUrl, $shortUrl);

        return $shortUrl;
    }

    private function createModel(string $originUrl, string $shortUrl)
    {
        $expiredTime = now()->addDays(5);

        Link::create([
            'origin_url' => $originUrl,
            'short_url' => $shortUrl,
            'expired_at' => $expiredTime
        ]);
    }
}