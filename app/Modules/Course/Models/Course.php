<?php

declare(strict_types=1);

namespace App\Modules\Course\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Course extends Model
{
    /** @use HasFactory<CourseFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'course_name',
        'course_type',
        'issuer',
        'awarding_year',
        'course_period',
        'city',
        'country_id',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): CourseFactory
    {
        return CourseFactory::new();
    }
}
