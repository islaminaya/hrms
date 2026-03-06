<?php

declare(strict_types=1);

namespace App\Modules\Experience\Data;

use App\Modules\Experience\Concerns\ExperienceValidationRules;
use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class CreateExperienceData extends Data
{
    use ExperienceValidationRules;

    public function __construct(
        public int $employee_id,
        public ?string $position,
        public ?string $organization,
        public ?string $city,
        public ?int $country_id,
        public ?string $department,
        public ?string $section,
        public ?CarbonImmutable $start_date,
        public ?CarbonImmutable $end_date,
        public ?string $tasks,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::experienceRules();
    }
}
