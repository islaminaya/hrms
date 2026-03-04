<?php

declare(strict_types=1);

namespace App\Modules\Identity\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateIdentityData extends Data
{
    public function __construct(
        public int $employee_id,
        public int $identity_type_id,
        public string $identity_number,
        public ?string $place_of_issue,
        public ?CarbonImmutable $issue_date,
        public CarbonImmutable $expiry_date,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'identity_type_id' => ['required', 'integer'],
            'identity_number' => ['required', 'string', 'size:10'],
            'place_of_issue' => ['nullable', 'string'],
            'issue_date' => ['nullable', 'date'],
            'expiry_date' => ['required', 'date', 'after:issue_date'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
