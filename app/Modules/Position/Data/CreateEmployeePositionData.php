<?php

declare(strict_types=1);

namespace App\Modules\Position\Data;

use App\Modules\Position\Concerns\EmployeePositionValidationRules;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class CreateEmployeePositionData extends Data
{
    use EmployeePositionValidationRules;

    public function __construct(
        public int $employee_id,
        public int $position_id,
        public CarbonImmutable $start_date,
        public ?CarbonImmutable $end_date,
        public ?int $created_by,
        public ?int $updated_by
    ) {}

    /** @return array<string, mixed> */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::employeePositionRules();
    }
}
