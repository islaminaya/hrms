<?php

declare(strict_types=1);

namespace App\Modules\Position\Models;

use Database\Factories\EmployeePositionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class EmployeePosition extends Model
{
    /** @use HasFactory<EmployeePositionFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'position_id',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): EmployeePositionFactory
    {
        return EmployeePositionFactory::new();
    }

    protected function casts()
    {
        return [
            'start_date' => 'immutable_datetime',
            'end_date' => 'immutable_datetime',
        ];
    }
}
