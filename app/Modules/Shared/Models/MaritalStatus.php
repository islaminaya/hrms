<?php

declare(strict_types=1);

namespace App\Modules\Shared\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class MaritalStatus extends Model
{
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
