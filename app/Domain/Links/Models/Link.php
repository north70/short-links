<?php

namespace App\Domain\Links\Models;

use App\Domain\Links\Models\Factories\LinkFactory;
use App\Domain\Support\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property string $origin_url Оригинальная ссылка
 * @property string $short_url Хэш для сокращённой ссылки
 * @property string $expired_at Дата и время жизни ссылки
 */
class Link extends Model
{
    use HasFactory;

    protected $table = 'links';

    protected $fillable = ['origin_url', 'short_url', 'expired_at'];

    public static function factory(): LinkFactory
    {
        return LinkFactory::new();
    }
}