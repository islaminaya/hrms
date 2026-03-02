<?php

namespace Database\Seeders;

use App\Modules\Shared\MaritalStatus\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaritalStatus::create([
            'name' => [
                'en' => 'Single',
                'ar' => 'أعزب',
            ],
            'code' => '1',
        ]);

        MaritalStatus::create([
            'name' => [
                'en' => 'Married',
                'ar' => 'متزوج',
            ],
            'code' => '2',
        ]);

        MaritalStatus::create([
            'name' => [
                'en' => 'Other',
                'ar' => 'آخر',
            ],
            'code' => '9',
        ]);
    }
}
