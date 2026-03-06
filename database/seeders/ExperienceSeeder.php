<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Experience\Models\Experience;
use Illuminate\Database\Seeder;

final class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::factory(10)->create();
    }
}
