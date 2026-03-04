<?php

declare(strict_types=1);

namespace App\Modules\Identity\Concerns;

trait IdentityValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function identityRules(): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'identity_type_id' => ['required', 'integer', 'exists:identity_types,id'],
            'identity_number' => ['required', 'string', 'size:10'],
            'place_of_issue' => ['nullable', 'string'],
            'issue_date' => ['nullable', 'date'],
            'expiry_date' => ['required', 'date', 'after:issue_date'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
