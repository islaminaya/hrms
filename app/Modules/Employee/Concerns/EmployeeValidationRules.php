<?php

declare(strict_types=1);

namespace App\Modules\Employee\Concerns;

trait EmployeeValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function employeeRules(): array
    {
        return [
            'user_id' => ['required', 'integer'],
            'head_id' => ['nullable', 'integer'],

            'employee_id' => ['required', 'string'],
            'first_name_ar' => ['required', 'string', 'min:2', 'max:30'],
            'middle_name_ar' => ['nullable', 'string', 'min:2', 'max:30'],
            'third_name_ar' => ['nullable', 'string', 'min:2', 'max:30'],
            'last_name_ar' => ['required', 'string', 'min:2', 'max:30'],
            'first_name_en' => ['required', 'string', 'min:2', 'max:30'],
            'middle_name_en' => ['nullable', 'string', 'min:2', 'max:30'],
            'third_name_en' => ['nullable', 'string', 'min:2', 'max:30'],
            'last_name_en' => ['required', 'string', 'min:2', 'max:30'],

            'marital_status_id' => ['nullable', 'integer'],
            'religion_id' => ['nullable', 'integer'],
            'special_need_id' => ['nullable', 'integer'],

            'gender_id' => ['required', 'integer'],
            'sponsorship_id' => ['required', 'integer'],
            'department_id' => ['required', 'integer'],
            'nationality_id' => ['required', 'integer'],
            'place_or_birth' => ['required', 'integer'],

            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
            'image' => ['nullable', 'string', 'url'],

            'date_of_birth' => ['required', 'date'],
            'joining_date' => ['required', 'date'],
            'leaving_date' => ['nullable', 'date'],

            'home_telephone_number' => ['nullable', 'string'],
            'home_country_identity' => ['nullable', 'string'],
            'blood_type' => ['nullable', 'string'],

            'is_active' => ['required', 'boolean'],

            'created_by' => ['nullable', 'integer'],
        ];
    }
}
