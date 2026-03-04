<?php

declare(strict_types=1);

use App\Modules\Employee\Actions\CreateEmployeeAction;
use App\Modules\Employee\Actions\UpdateEmployeeAction;
use App\Modules\Employee\Data\CreateEmployeeData;
use App\Modules\Employee\Data\UpdateEmployeeData;
use App\Modules\Employee\Models\Employee;
use Illuminate\Validation\ValidationException;

it('creates an employee with valid data', function (): void {
    $this->seed();
    $newEmployee = Employee::factory()->make();
    $data = CreateEmployeeData::from($newEmployee->toArray());

    $employee = (new CreateEmployeeAction())->handle($data);

    $this->assertDatabaseHas(
        $employee->getTable(),
        $employee->getAttributes()
    );

});

it('fails to create employee with invalid data', function (array $overrides): void {
    $this->seed();
    $employee = Employee::factory()->make($overrides);

    $this->expectException(ValidationException::class);

    CreateEmployeeData::from($employee->toArray());

})->with('invalid-data');

it('updates an employee with valid data', function (): void {
    $this->seed();
    $employee = Employee::query()->first();

    $newEmployee = Employee::factory()->make();

    $updated = (new UpdateEmployeeAction())->handle(UpdateEmployeeData::from($newEmployee), $employee);

    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );
});

it('fails to create employee data with invalid data', function (array $overrides): void {
    $this->seed();
    $employee = Employee::factory()->make($overrides);

    $this->expectException(ValidationException::class);

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

    'first_name_ar is short' => [
        ['first_name_ar' => 'a'],
    ],

    'first_name_ar is long' => [
        ['first_name_ar' => str_repeat('a', 31)],
    ],

    'first_name_en is null' => [
        ['first_name_en' => null],
    ],

    'first_name_en is short' => [
        ['first_name_en' => 'a'],
    ],

    'first_name_en is long' => [
        ['first_name_en' => str_repeat('a', 31)],
    ],

    'last_name_ar is null' => [
        ['last_name_ar' => null],
    ],

    'last_name_ar is short' => [
        ['last_name_ar' => 'a'],
    ],

    'last_name_ar is long' => [
        ['last_name_ar' => str_repeat('a', 31)],
    ],

    'last_name_en is null' => [
        ['last_name_en' => null],
    ],

    'last_name_en is short' => [
        ['last_name_en' => 'a'],
    ],

    'last_name_en is long' => [
        ['last_name_en' => str_repeat('a', 31)],
    ],

    'gender_id is null' => [
        ['gender_id' => null],
    ],

    'gender_id is string' => [
        ['gender_id' => 'm'],
    ],

    'department_id is null' => [
        ['department_id' => null],
    ],

    'department_id is string' => [
        ['department_id' => 'cls'],
    ],

    'sponsorship_id is null' => [
        ['sponsorship_id' => null],
    ],

    'sponsorship_id is string' => [
        ['sponsorship_id' => 'csm'],
    ],

    'nationality_id is null' => [
        ['nationality_id' => null],
    ],

    'nationality_id is string' => [
        ['nationality_id' => 'sau'],
    ],
]);
