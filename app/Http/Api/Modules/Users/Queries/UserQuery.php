<?php

namespace App\Http\Api\Modules\Users\Queries;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class UserQuery extends QueryBuilder
{
    public function __construct(Request $request)
    {
        parent::__construct(User::query());

        $this->allowedSorts([
            'id',
            'created_at',
            'updated_at'
        ]);

        $this->defaultSort('id');

        $this->allowedFilters([
            AllowedFilter::exact('id'),
        ]);
    }
}