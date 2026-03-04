<?php

declare(strict_types=1);

use App\Modules\JobTitle\Actions\CreateEmployeeTitleAction;
use App\Modules\JobTitle\Actions\UpdateEmployeeTitleAction;
use App\Modules\JobTitle\Data\CreateEmployeeTitleData;
use App\Modules\JobTitle\Data\UpdateEmployeeTitleData;
use App\Modules\JobTitle\Models\EmployeeJobTitle;
use Carbon\CarbonImmutable;
use Illuminate\Validation\ValidationException;

test('creates employee job title from valid data', function (): void {
    $this->seed();
    $title = EmployeeJobTitle::factory()->make();

    $createdTitle = (new CreateEmployeeTitleAction())
        ->handle(CreateEmployeeTitleData::from($title));

    $createdTitle->refresh();

    $this->assertInstanceOf(EmployeeJobTitle::class, $createdTitle);
    $this->assertDatabaseHas(
        $createdTitle->getTable(),
        $createdTitle->getAttributes()
    );
});

it('updates employee job title with valid data', function (): void {
    $this->seed();
    $oldTitle = EmployeeJobTitle::query()->first();
    $updated = EmployeeJobTitle::factory()->make();

    $updatedTitle = (new UpdateEmployeeTitleAction())
        ->handle(
            UpdateEmployeeTitleData::from($updated),
            $oldTitle
        );

    $updatedTitle->refresh();

    $this->assertInstanceOf(EmployeeJobTitle::class, $updatedTitle);
    $this->assertDatabaseHas(
        $updatedTitle->getTable(),
        $updatedTitle->getAttributes(),
    );
});

it('fails to create a data object with invalid data', function (array $overrides): void {
    $this->seed();
    $jobTitle = EmployeeJobTitle::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateEmployeeTitleData::from($jobTitle);
})->with('invalid-data');

it('fails to create an update data object with invalid data', function (array $overrides): void {
    $this->seed();
    $jobTitle = EmployeeJobTitle::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateEmployeeTitleData::from($jobTitle);
})->with('invalid-data');

dataset('invalid-data', [
    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'employee_id is string' => [
        ['employee_id' => 'a'],
    ],

    'job_title_id is null' => [
        ['job_title_id' => null],
    ],

    'job_title_id is string' => [
        ['job_title_id' => 'a'],
    ],

    'is_primary is null' => [
        ['is_primary' => null],
    ],

    'is_primary is not boolean' => [
        ['is_primary' => 'not boolean'],
    ],

    'start_date is null' => [
        ['start_date' => null],
    ],

    'start_date is invalid' => [
        ['start_date' => 'invalid-date'],
    ],

    'end_date before start_date' => [
        [
            'start_date' => CarbonImmutable::parse('2026-03-04'),
            'end_date' => CarbonImmutable::parse('2026-03-03'),
        ],
    ],
]);
