<?php

declare(strict_types=1);

use App\Modules\Position\Actions\CreateEmployeePositionAction;
use App\Modules\Position\Actions\UpdateEmployeePositionAction;
use App\Modules\Position\Data\CreateEmployeePositionData;
use App\Modules\Position\Data\UpdateEmployeePositionData;
use App\Modules\Position\Models\EmployeePosition;
use Illuminate\Validation\ValidationException;

it('creates a position for an employee with valid data', function (): void {
    $this->seed();
    $position = EmployeePosition::factory()->raw();

    $created = (new CreateEmployeePositionAction())
        ->handle(CreateEmployeePositionData::from($position));

    $this->assertInstanceOf(EmployeePosition::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updated a position for an employee with valid data', function (): void {
    $this->seed();
    $position = EmployeePosition::query()->first();
    $newPosition = EmployeePosition::factory()->raw();

    $updated = (new UpdateEmployeePositionAction())
        ->handle(UpdateEmployeePositionData::from($newPosition), $position);

    $this->assertInstanceOf(EmployeePosition::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );
});

it('fails to create a create data object with invalid data', function (array $overrides): void {
    $this->seed();
    $position = EmployeePosition::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateEmployeePositionData::from($position);
})->with('invalid-data');

it('fails to create an update data object with invalid data', function (array $overrides): void {
    $this->seed();
    $position = EmployeePosition::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateEmployeePositionData::from($position);
})->with('invalid-data');

dataset('invalid-data', [
    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'position_id is null' => [
        ['position_id' => null],
    ],

    'start_date is null' => [
        ['start_date' => null],
    ],

    'start_date is invalid date' => [
        ['start_date' => 'not-a-valid-date'],
    ],

    'end_date is not after start_date' => [
        [
            'start_date' => '2026-03-05',
            'end_date' => '2026-03-04',
        ],
    ],
]);
