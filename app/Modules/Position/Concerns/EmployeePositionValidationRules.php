<?php

declare(strict_types=1);

namespace App\Modules\Position\Concerns;

trait EmployeePositionValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function employeePositionRules(): array
    {
        return [
            'employee_id' => ['required', 'int'],
            'position_id' => ['required', 'int'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'created_by' => ['nullable', 'int'],
            'updated_by' => ['nullable', 'int'],
        ];
    }
}
