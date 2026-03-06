<?php

declare(strict_types=1);

namespace App\Modules\Experience\Concerns;

trait ExperienceValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function experienceRules(): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'position' => ['nullable', 'string', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'integer'],
            'department' => ['nullable', 'string', 'max:255'],
            'section' => ['nullable', 'string', 'max:255'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date', 'after:start_date'],
            'tasks' => ['nullable', 'string'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
