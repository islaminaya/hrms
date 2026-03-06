<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Course\Models\CourseType;
use Illuminate\Database\Seeder;

final class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CourseType::query()->create([
            'name' => [
                'ar' => 'تدريب',
                'en' => 'Training',
            ],
            'code' => '1',
        ]);
        CourseType::query()->create([
            'name' => [
                'ar' => 'شهادة',
                'en' => 'Certificate',
            ],
            'code' => '2',
        ]);
        CourseType::query()->create([
            'name' => [
                'ar' => 'ورشة عمل',
                'en' => 'Workshop',
            ],
            'code' => '3',
        ]);
        CourseType::query()->create([
            'name' => [
                'ar' => 'ندوة',
                'en' => 'Symposium',
            ],
            'code' => '4',
        ]);
        CourseType::query()->create([
            'name' => [
                'ar' => 'اخرى',
                'en' => 'Other',
            ],
            'code' => '5',
        ]);
    }
}
