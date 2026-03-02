<?php

namespace Database\Seeders;

use App\Modules\Shared\Gender\Models\Gender;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Gender::create([
            'name' => [
                'en' => 'Male',
                'ar' => 'ذكر',
            ],
            'code' => '1',
        ]);

        Gender::create([
            'name' => [
                'en' => 'Female',
                'ar' => 'انثى',
            ],
            'code' => '2',
        ]);
    }
}
