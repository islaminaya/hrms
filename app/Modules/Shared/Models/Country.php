<?php

declare(strict_types=1);

namespace App\Modules\Shared\Models;

use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class Country extends Model
{
    /** @use HasFactory<CountryFactory> */
    use HasFactory;

    use HasTranslations;

    /** @var array<string> */
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'order',
        'lang',
        'is_active',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): CountryFactory
    {
        return CountryFactory::new();
    }
}
