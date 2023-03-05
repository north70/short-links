<?php

namespace App\Domain\Support\Traits;

use Illuminate\Database\Query\Builder;

trait TimestampsScope
{
    public function scopeCreatedAtLt(Builder $query, $date): Builder
    {
        return $query->where('created_at', '<', $date);
    }

    public function scopeCreatedAtGt(Builder $query, $date): Builder
    {
        return $query->where('created_at', '>', $date);
    }

    public function scopeUpdatedAtLt(Builder $query, $date): Builder
    {
        return $query->where('updated_at', '<', $date);
    }

    public function scopeUpdatedAtGt(Builder $query, $date): Builder
    {
        return $query->where('updated_at', '>', $date);
    }
}
