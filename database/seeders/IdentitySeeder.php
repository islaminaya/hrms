<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Identity\Models\Identity;
use Illuminate\Database\Seeder;

final class IdentitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Identity::factory(50)->create();
    }
}
