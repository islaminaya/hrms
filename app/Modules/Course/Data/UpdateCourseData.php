<?php

declare(strict_types=1);

namespace App\Modules\Course\Data;

use App\Modules\Course\Concerns\CourseValidationRules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateCourseData extends Data
{
    use CourseValidationRules;

    public function __construct(
        public ?int $employee_id,
        public ?string $course_name,
        public ?string $course_type,
        public ?string $issuer,
        public ?int $awarding_year,
        public ?string $course_period,
        public ?string $city,
        public ?int $country_id,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::courseRules();
    }
}
