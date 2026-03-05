<?php

declare(strict_types=1);

namespace App\Modules\Position\Models;

use Database\Factories\PositionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class Position extends Model
{
    /** @use HasFactory<PositionFactory> */
    use HasFactory;

    use HasTranslations;

    /** @var array<string> */
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): PositionFactory
    {
        return PositionFactory::new();
    }
}
