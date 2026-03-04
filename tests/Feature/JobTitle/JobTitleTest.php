<?php

declare(strict_types=1);

use App\Modules\Employee\Data\UpdateEmployeeData;
use App\Modules\JobTitle\Actions\CreateJobTitleAction;
use App\Modules\JobTitle\Data\CreateJobTitleData;
use App\Modules\JobTitle\Models\JobTitle;
use Illuminate\Validation\ValidationException;

it('creates a job title with valid data', function (): void {
    $attributes = JobTitle::factory()->raw();

    $jobTitle = (new CreateJobTitleAction())->handle(
        CreateJobTitleData::from($attributes)
    );

    $this->assertInstanceOf(JobTitle::class, $jobTitle);
    $this->assertDatabaseHas(
        $jobTitle->getTable(),
        $jobTitle->getAttributes()
    );
});

it('updates a jon title', function (): void {
    $jobTitle = JobTitle::factory()->create();
    $attributes = JobTitle::factory()->raw();

    $jobTitle = (new CreateJobTitleAction())->handle(
        CreateJobTitleData::from($attributes)
    );

    $this->assertInstanceOf(JobTitle::class, $jobTitle);
    $this->assertDatabaseHas(
        $jobTitle->getTable(),
        $jobTitle->getAttributes()
    );
});

it('fails to create a data object with invalid data', function (array $overrides): void {
    $this->seed();
    $jobTitle = JobTitle::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateJobTitleData::validateAndCreate($jobTitle);
})->with('invalid-data');

it('fails to update a data object with invalid data', function (array $overrides): void {
    $this->seed();
    $jobTitle = JobTitle::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateEmployeeData::validateAndCreate($jobTitle);
})->with('invalid-data');

dataset('invalid-data', [
    'name is null' => [
        ['name' => null],
    ],
    'name is string' => [
        ['name' => 'a'],
    ],
    'name_ar is short' => [
        ['name' => [
            'ar' => 'a',
        ]],
    ],
    'name_ar is long' => [
        ['name' => [
            'ar' => str_repeat('a', 101),
        ]],
    ],
    'name_en is short' => [
        ['name' => [
            'en' => 'a',
        ]],
    ],
    'name_en is long' => [
        ['name' => [
            'en' => str_repeat('a', 101),
        ]],
    ],
]);
