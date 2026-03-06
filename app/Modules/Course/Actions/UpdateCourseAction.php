<?php

declare(strict_types=1);

namespace App\Modules\Course\Actions;

use App\Modules\Course\Data\UpdateCourseData;
use App\Modules\Course\Models\Course;

final readonly class UpdateCourseAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateCourseData $data, Course $course): Course
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($course, function (Course $course) use ($attributes): void {
            $course->update($attributes);
        });
    }
}
