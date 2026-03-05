<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Rank\Models\EmployeeRank;
use Illuminate\Database\Seeder;

final class EmployeeRankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeeRank::factory(10)->create();
    }
}
