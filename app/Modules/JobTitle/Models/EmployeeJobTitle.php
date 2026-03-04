<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Models;

use Database\Factories\EmployeeJobTitleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class EmployeeJobTitle extends Model
{
    /** @use HasFactory<EmployeeJobTitleFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'job_title_id',
        'is_primary',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): EmployeeJobTitleFactory
    {
        return EmployeeJobTitleFactory::new();
    }

    protected function casts(): array
    {
        return [
            'start_date' => 'immutable_datetime',
            'end_date' => 'immutable_datetime',
        ];
    }
}
