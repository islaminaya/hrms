<?php

declare(strict_types=1);

namespace App\Modules\Rank\Models;

use Database\Factories\EmployeeRankFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class EmployeeRank extends Model
{
    /** @use HasFactory<EmployeeRankFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'rank_id',
        'start_date',
        'end_date',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): EmployeeRankFactory
    {
        return EmployeeRankFactory::new();
    }
}
