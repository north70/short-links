<?php

namespace App\Http\Api\Support\Enums;

class PaginationTypeEnum
{
    public const CURSOR = 'cursor';
    public const OFFSET = 'offset';

    /**
     * @return string[]
     */
    public static function cases(): array
    {
        return [
            self::CURSOR,
            self::OFFSET,
        ];
    }
}
