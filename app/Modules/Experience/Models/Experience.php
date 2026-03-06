<?php

declare(strict_types=1);

namespace App\Modules\Experience\Models;

use Database\Factories\ExperienceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Experience extends Model
{
    /** @use HasFactory<ExperienceFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'position',
        'organization',
        'city',
        'country_id',
        'department',
        'section',
        'start_date',
        'end_date',
        'tasks',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): ExperienceFactory
    {
        return ExperienceFactory::new();
    }
}
