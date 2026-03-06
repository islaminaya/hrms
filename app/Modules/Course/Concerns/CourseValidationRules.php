<?php

declare(strict_types=1);

namespace App\Modules\Course\Concerns;

trait CourseValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function courseRules(): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'course_name' => ['nullable', 'string', 'max:255'],
            'course_type_id' => ['nullable', 'integer'],
            'issuer' => ['nullable', 'string', 'max:255'],
            'awarding_year' => ['nullable', 'integer'],
            'course_period' => ['nullable', 'string', 'max:255'],
            'city' => ['nullable', 'string', 'max:255'],
            'country_id' => ['nullable', 'integer'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
