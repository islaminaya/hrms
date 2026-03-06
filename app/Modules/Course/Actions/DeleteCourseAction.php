<?php

declare(strict_types=1);

namespace App\Modules\Course\Actions;

use App\Modules\Course\Models\Course;

final readonly class DeleteCourseAction
{
    /**
     * Execute the action.
     */
    public function handle(Course $course): void
    {
        $course->delete();
    }
}
