<?php

declare(strict_types=1);

namespace App\Modules\Employee\Models;

use Database\Factories\EmployeeFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Employee extends Model
{
    /** @use HasFactory<EmployeeFactory> */
    use HasFactory;
}
