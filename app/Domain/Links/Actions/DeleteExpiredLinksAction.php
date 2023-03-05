<?php

namespace App\Domain\Links\Actions;

use App\Domain\Links\Models\Link;

class DeleteExpiredLinksAction
{
    public function execute(): void
    {
        $timeNow = now();

        Link::query()
            ->where('expired_at', '<', $timeNow)
            ->delete();
    }
}