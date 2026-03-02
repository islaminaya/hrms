<?php

namespace Database\Seeders;

use App\Modules\Organization\Department\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Department::factory(15)->create();

        $departments = Department::all();

        foreach ($departments as $department) {
            $parent = $departments->random();
            $department->parent_id = $parent->id;
            $department->save();
        }
    }
}
