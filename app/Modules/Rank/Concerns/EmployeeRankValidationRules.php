<?php

declare(strict_types=1);

namespace App\Modules\Rank\Concerns;

trait EmployeeRankValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function employeeRankRules(): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'rank_id' => ['required', 'integer'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
