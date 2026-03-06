<?php

declare(strict_types=1);

namespace App\Modules\Achievement\Data;

use App\Modules\Achievement\Concerns\AchievementValidationRules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class CreateAchievementData extends Data
{
    use AchievementValidationRules;

    public function __construct(
        public int $employee_id,
        public string $achievement_title,
        public int $achievement_year,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::achievementRules();
    }
}
