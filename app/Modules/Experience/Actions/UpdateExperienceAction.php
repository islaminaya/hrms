<?php

declare(strict_types=1);

namespace App\Modules\Experience\Actions;

use App\Modules\Experience\Data\UpdateExperienceData;
use App\Modules\Experience\Models\Experience;

final readonly class UpdateExperienceAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateExperienceData $data, Experience $experience): Experience
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($experience, function (Experience $experience) use ($attributes): void {
            $experience->update($attributes);
        });
    }
}
