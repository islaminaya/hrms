<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Position\Models\EmployeePosition;
use Illuminate\Database\Seeder;

final class EmployeePositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeePosition::factory(10)->create();
    }
}
