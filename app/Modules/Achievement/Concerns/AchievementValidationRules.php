<?php

declare(strict_types=1);

namespace App\Modules\Achievement\Concerns;

trait AchievementValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function achievementRules(): array
    {
        return [
            'employee_id' => ['required', 'integer'],
            'achievement_title' => ['required', 'string', 'max:255'],
            'achievement_year' => ['required', 'integer'],
        ];
    }
}
