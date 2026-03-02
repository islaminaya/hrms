<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Employee\Models\Employee;
use Illuminate\Database\Seeder;

final class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Employee::factory(50)->create();

        $employees = Employee::all();

        foreach ($employees as $employee) {
            /** @var Employee $head */
            $head = $employees->random();
            $employee->head_id = $head->id;
            $employee->save();
        }
    }
}
