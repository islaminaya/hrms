<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Actions;

use App\Modules\JobTitle\Data\CreateJobTitleData;
use App\Modules\JobTitle\Models\JobTitle;

final readonly class UpdateJobTitleAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateJobTitleData $data, JobTitle $jobTitle): JobTitle
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($jobTitle, function (JobTitle $jobTitle) use ($attributes): void {
            $jobTitle->update($attributes);
        });
    }
}
