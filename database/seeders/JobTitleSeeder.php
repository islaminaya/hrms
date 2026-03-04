<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\JobTitle\Models\JobTitle;
use Illuminate\Database\Seeder;

final class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JobTitle::factory(50)->create();
    }
}
