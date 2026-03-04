<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\JobTitle\Models\EmployeeJobTitle;
use Illuminate\Database\Seeder;

final class EmployeeJobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeJobTitle::factory(50)->create();
    }
}
