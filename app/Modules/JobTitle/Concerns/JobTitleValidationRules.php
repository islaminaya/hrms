<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Concerns;

trait JobTitleValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function jobTitleRules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ar' => ['required', 'string', 'min:2', 'max:100'],
            'name.en' => ['required', 'string', 'min:2', 'max:100'],
            'code' => ['nullable', 'string'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
