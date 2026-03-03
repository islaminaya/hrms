<?php

declare(strict_types=1);

use App\Modules\Employee\Actions\CreateEmployeeAction;
use App\Modules\Employee\Actions\UpdateEmployeeAction;
use App\Modules\Employee\Data\CreateEmployeeData;
use App\Modules\Employee\Data\UpdateEmployeeData;
use App\Modules\Employee\Models\Employee;

it('creates an employee', function (): void {
    $this->seed();
    $newEmployee = Employee::factory()->make();

    $data = CreateEmployeeData::from($newEmployee->toArray());

    $employee = (new CreateEmployeeAction())->handle($data);

    $this->assertDatabaseHas('employees', CreateEmployeeData::from($employee)->toArray());

});

it('fails to create employee with invalid data', function (array $overrides): void {
    $this->seed();

    $employee = Employee::factory()->make($overrides);

    $this->expectException(TypeError::class);

    CreateEmployeeData::from($employee->toArray());

})->with('invalid-data');

it('updated an employee with valid data', function (): void {
    $this->seed();
    $employee = Employee::query()->first();

    $newEmployee = Employee::factory()->make();

    $updated = (new UpdateEmployeeAction())->handle(UpdateEmployeeData::from($newEmployee), $employee);

    $this->assertDatabaseHas('employees', UpdateEmployeeData::from($updated)->toArray());
});

it('fails to update an employee with invalid data', function (array $overrides): void {
    $this->seed();

    $employee = Employee::factory()->make($overrides);

    $this->expectException(TypeError::class);

    UpdateEmployeeData::from($employee->toArray());

})->with('invalid-data');

dataset('invalid-data', [
    'user_id is null' => [
        ['user_id' => null],
    ],

    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'first_name_ar is null' => [
        ['first_name_ar' => null],
    ],

    'first_name_en is null' => [
        ['first_name_en' => null],
    ],

    'last_name_ar is null' => [
        ['last_name_ar' => null],
    ],

    'last_name_en is null' => [
        ['last_name_en' => null],
    ],

    'gender_id is null' => [
        ['gender_id' => null],
    ],

    'department_id is null' => [
        ['department_id' => null],
    ],

    'sponsorship_id is null' => [
        ['sponsorship_id' => null],
    ],

    'nationality_id is null' => [
        ['nationality_id' => null],
    ],
]);
