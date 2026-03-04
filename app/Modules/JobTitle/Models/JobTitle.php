<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Models;

use Database\Factories\JobTitleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

final class JobTitle extends Model
{
    /** @use HasFactory<JobTitleFactory> */
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

    protected static function newFactory(): JobTitleFactory
    {
        return JobTitleFactory::new();
    }
}
