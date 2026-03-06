<?php

declare(strict_types=1);

namespace App\Modules\Achievement\Actions;

use App\Modules\Achievement\Models\Achievement;

final readonly class DeleteAchievementAction
{
    /**
     * Execute the action.
     */
    public function handle(Achievement $achievement): void
    {
        $achievement->delete();
    }
}
