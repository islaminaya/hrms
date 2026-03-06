<?php

declare(strict_types=1);

namespace App\Modules\Achievement\Actions;

use App\Modules\Achievement\Data\CreateAchievementData;
use App\Modules\Achievement\Models\Achievement;

final readonly class CreateAchievementAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateAchievementData $data): Achievement
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Achievement::query()->create($attributes);
    }
}
