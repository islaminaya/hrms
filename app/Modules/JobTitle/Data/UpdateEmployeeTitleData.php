<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Data;

use App\Modules\JobTitle\Concerns\EmployeeTitleValidationRules;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateEmployeeTitleData extends Data
{
    use EmployeeTitleValidationRules;

    public function __construct(
        public int $employee_id,
        public int $job_title_id,
        public bool $is_primary,
        public CarbonImmutable $start_date,
        public ?CarbonImmutable $end_date,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::assignmentRule();
    }
}
