<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Identity\Models\IdentityType;
use Illuminate\Database\Seeder;

final class IdentityTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        IdentityType::query()->create([
            'name' => [
                'ar' => 'الهوية الوطنية',
                'en' => 'National ID',
            ],
            'code' => '1',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'الإقامة',
                'en' => 'Residence',
            ],
            'code' => '2',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'جواز السفر',
                'en' => 'Passport',
            ],
            'code' => '3',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'رخصة القيادة',
                'en' => 'Driving License',
            ],
            'code' => '4',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'بطاقة الهوية العسكرية',
                'en' => 'Military ID Card',
            ],
            'code' => '5',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'بطاقة الهوية المدنية',
                'en' => 'Civil ID Card',
            ],
            'code' => '6',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'بطاقة الهوية الطلابية',
                'en' => 'Student ID Card',
            ],
            'code' => '7',
        ]);

        IdentityType::query()->create([
            'name' => [
                'ar' => 'بطاقة الهوية الصحية',
                'en' => 'Health ID Card',
            ],
            'code' => '8',
        ]);
    }
}
