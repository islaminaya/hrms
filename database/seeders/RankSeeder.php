<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Rank\Models\Rank;
use Illuminate\Database\Seeder;

final class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Rank::factory(7)->create();
    }
}
