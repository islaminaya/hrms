<?php

declare(strict_types=1);

namespace App\Modules\Experience\Actions;

use App\Modules\Experience\Data\CreateExperienceData;
use App\Modules\Experience\Models\Experience;

final readonly class CreateExperienceAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateExperienceData $data): Experience
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Experience::query()->create($attributes);
    }
}
