<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Concerns;

trait EmployeeTitleValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function assignmentRule(): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'job_title_id' => ['required', 'integer'],
            'is_primary' => ['required', 'boolean'],
            'start_date' => ['required', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
        ];
    }
}
