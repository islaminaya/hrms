<?php

declare(strict_types=1);

namespace App\Modules\Rank\Models;

use Database\Factories\RankFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class Rank extends Model
{
    /** @use HasFactory<RankFactory> */
    use HasFactory;

    use HasTranslations;

    /** @var array<string> */
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'type',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): RankFactory
    {
        return RankFactory::new();
    }
}
