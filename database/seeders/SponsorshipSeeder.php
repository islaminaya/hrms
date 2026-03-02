<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Staff\Sponsorship\Models\Sponsorship;
use Illuminate\Database\Seeder;

final class SponsorshipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sponsorship::query()->create([
            'name' => [
                'en' => 'Company A',
                'ar' => 'الشركة أ',
            ],
            'code' => 'COMPANY_A',
        ]);

        Sponsorship::query()->create([
            'name' => [
                'en' => 'Company B',
                'ar' => 'الشركة ب',
            ],
            'code' => 'COMPANY_B',
        ]);

        Sponsorship::query()->create([
            'name' => [
                'en' => 'Company C',
                'ar' => 'الشركة ج',
            ],
            'code' => 'COMPANY_C',
        ]);
    }
}
