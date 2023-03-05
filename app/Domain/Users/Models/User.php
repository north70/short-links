<?php

namespace App\Domain\Users\Models;

use App\Domain\Users\Models\Tests\Factories\UserFactory;
use App\Domain\Words\Models\UserWord;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * @property int $id
 * @property string $email
 * @property string $name
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
 *
 * @property-read UserWord[]|Collection $userWords
 */
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
    use HasFactory;

    protected $fillable = ['email', 'name' , 'password'];
    protected $hidden = ['password'];

    public static function tableName(): string
    {
        return (new static())->getTable();
    }

    public function userWords(): HasMany
    {
        return $this->hasMany(UserWord::class, 'user_id', 'id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function factory(): UserFactory
    {
        return UserFactory::new();
    }
}
