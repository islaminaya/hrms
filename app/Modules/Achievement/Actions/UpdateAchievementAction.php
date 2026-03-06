<?php

declare(strict_types=1);

namespace App\Modules\Achievement\Actions;

use App\Modules\Achievement\Data\UpdateAchievementData;
use App\Modules\Achievement\Models\Achievement;

final readonly class UpdateAchievementAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateAchievementData $data, Achievement $achievement): Achievement
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($achievement, function (Achievement $achievement) use ($attributes): void {
            $achievement->update($attributes);
        });
    }
}
