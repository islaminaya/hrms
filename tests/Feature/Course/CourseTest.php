<?php

declare(strict_types=1);

use App\Modules\Course\Actions\CreateCourseAction;
use App\Modules\Course\Actions\DeleteCourseAction;
use App\Modules\Course\Actions\UpdateCourseAction;
use App\Modules\Course\Data\CreateCourseData;
use App\Modules\Course\Data\UpdateCourseData;
use App\Modules\Course\Models\Course;
use Illuminate\Validation\ValidationException;

it('creates a course with valid data ', function (): void {

    $this->seed();
    $course = Course::factory()->raw();

    $created = (new CreateCourseAction())
        ->handle(CreateCourseData::from($course));

    $this->assertInstanceOf(Course::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updates a course with valid data', function (): void {

    $this->seed();
    $course = Course::query()->first();
    $newCourse = Course::factory()->raw();

    $updated = (new UpdateCourseAction())
        ->handle(UpdateCourseData::from($newCourse), $course);

    $this->assertInstanceOf(Course::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );
});

it('deletes a course', function (): void {

    $this->seed();
    $course = Course::factory()->create();

    (new DeleteCourseAction())->handle($course);

    $this->assertDatabaseMissing(
        $course->getTable(),
        $course->getAttributes()
    );
});

it('fails to create create course data with invalid data', function (array $overrides): void {

    $this->seed();
    $course = Course::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateCourseData::from($course);

})->with('invalid-data');

it('fails to create update course data with invalid data', function (array $overrides): void {

    $this->seed();
    $course = Course::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateCourseData::from($course);

})->with('invalid-data');

dataset('invalid-data', [

    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'employee_id is string' => [
        ['employee_id' => 'a'],
    ],

    'course_name is too long' => [
        ['course_name' => str_repeat('a', 256)],
    ],

    'course_type is too long' => [
        ['course_type' => str_repeat('a', 256)],
    ],

    'issuer is too long' => [
        ['issuer' => str_repeat('a', 256)],
    ],

    'course_period is too long' => [
        ['course_period' => str_repeat('a', 256)],
    ],

    'city is too long' => [
        ['city' => str_repeat('a', 256)],
    ],

    'country_id is string' => [
        ['country_id' => 'not a valid country id'],
    ],

]);
