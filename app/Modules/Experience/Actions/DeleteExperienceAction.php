<?php

declare(strict_types=1);

namespace App\Modules\Experience\Actions;

use App\Modules\Experience\Models\Experience;

final readonly class DeleteExperienceAction
{
    /**
     * Execute the action.
     */
    public function handle(Experience $experience): void
    {
        $experience->delete();
    }
}
