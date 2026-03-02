<?php

namespace App\Modules\Shared\Country\Models;

use Database\Factories\CountryFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Country extends Model
{
    /** @use HasFactory<\Database\Factories\CountryFactory> */
    use HasFactory;

    use HasTranslations;
    /** @var array<string> $translatable*/
    public $translatable = ['name'];

    protected static function newFactory(): CountryFactory
    {
        return CountryFactory::new();
    }

    protected $fillable = [
        'name',
        'code',
        'order',
        'lang',
        'is_active',
        'created_by',
        'updated_by',
    ];
}
