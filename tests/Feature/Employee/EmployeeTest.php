<?php

declare(strict_types=1);

use App\Modules\Employee\Actions\CreateEmployeeAction;
use App\Modules\Employee\Data\CreateEmployeeData;
use App\Modules\Employee\Models\Employee;
use Illuminate\Validation\ValidationException;

it('creates an employee', function () {
    $this->seed();
    $newEmployee = Employee::factory()->make();

    $data = CreateEmployeeData::from($newEmployee->toArray());

    $employee = (new CreateEmployeeAction())->handle($data);

    $this->assertDatabaseHas('employees', CreateEmployeeData::from($employee)->toArray());

});

it('fails to create employee with invalid data', function (array $overrides) {
    $this->seed();

    $employee = Employee::factory()->make($overrides);

    $this->expectException(ValidationException::class);

    CreateEmployeeData::from($employee->toArray());

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

    // 'first_name_ar too short' => [
    //     ['first_name_ar' => 'A'],
    // ],

    // 'first_name_en too long' => [
    //     ['first_name_en' => str_repeat('a', 31)],
    // ],

    // 'email invalid format' => [
    //     ['email' => 'not-an-email'],
    // ],

    // 'phone invalid format' => [
    //     ['phone' => 'abc123!@#'],
    // ],

    // 'employee_id invalid pattern' => [
    //     ['employee_id' => '600123'],
    // ],

]);

