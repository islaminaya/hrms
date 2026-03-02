<?php

declare(strict_types=1);

namespace App\Modules\Shared\Gender\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class Gender extends Model
{
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
}
