<?php

declare(strict_types=1);

namespace App\Modules\Employee\Models;

use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $head_id
 */
final class Employee extends Model
{
    /** @use HasFactory<EmployeeFactory> */
    use HasFactory;

    protected $guarded = [];

    protected static function newFactory(): EmployeeFactory
    {
        return EmployeeFactory::new();
    }
}
