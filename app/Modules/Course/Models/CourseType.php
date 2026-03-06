<?php

declare(strict_types=1);

namespace App\Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class CourseType extends Model
{
    use HasTranslations;

    /** @var array<string> */
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'created_by',
        'update_by',
    ];
}
