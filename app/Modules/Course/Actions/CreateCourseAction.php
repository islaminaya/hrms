<?php

declare(strict_types=1);

namespace App\Modules\Course\Actions;

use App\Modules\Course\Data\CreateCourseData;
use App\Modules\Course\Models\Course;

final readonly class CreateCourseAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateCourseData $data): Course
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Course::query()->create($attributes);
    }
}
