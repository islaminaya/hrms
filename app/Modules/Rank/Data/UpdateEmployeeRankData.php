<?php

declare(strict_types=1);

namespace App\Modules\Rank\Data;

use App\Modules\Rank\Concerns\EmployeeRankValidationRules;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateEmployeeRankData extends Data
{
    use EmployeeRankValidationRules;

    public function __construct(
        public int $employee_id,
        public int $rank_id,
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
        return self::employeeRankRules();
    }
}
