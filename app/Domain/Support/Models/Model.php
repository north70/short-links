<?php

namespace App\Domain\Support\Models;

use App\Domain\Support\Traits\TimestampsScope;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Базовая модель
 * @property int $id
 * @property CarbonInterface|null $created_at
 * @property CarbonInterface|null $updated_at
 * @method static static|EloquentCollection|null find(int|int[] $id, array $columns = [])
 * @method static static|EloquentCollection|static[] findOrFail(int|int[] $id, array $columns = [])
 * @method static static create(array $fields)
 * @method static static firstOrCreate(array $attributes = [], array $values = [])
 *
 * @method static static|Builder lockForUpdate()
 * @method static static|Builder where(string $column, $operator = null, $value = null, string $boolean = 'and')
 * @method static static|Builder whereKey($id)
 */
class Model extends EloquentModel
{
    use TimestampsScope;

    public static function tableName(): string
    {
        return (new static())->getTable();
    }
}
