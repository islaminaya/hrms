<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Modules\Shared\Models\SpecialNeeds;
use Illuminate\Database\Seeder;

final class SpecialNeedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Wheelchair',
                'ar' => 'كرسي متحرك',
            ],
            'code' => 'wheelchair',
        ]);

        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Visual Impairment',
                'ar' => 'ضعف بصري',
            ],
            'code' => 'visual_impairment',
        ]);

        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Hearing Impairment',
                'ar' => 'ضعف سمعي',
            ],
            'code' => 'hearing_impairment',
        ]);

        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Speech Impairment',
                'ar' => 'ضعف صوتي',
            ],
            'code' => 'speech_impairment',
        ]);

        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Cognitive Impairment',
                'ar' => 'ضعف إدراكي',
            ],
            'code' => 'cognitive_impairment',
        ]);

        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Autism Spectrum Disorder',
                'ar' => 'اضطراب طيف التوحد',
            ],
            'code' => 'autism_spectrum_disorder',
        ]);

        SpecialNeeds::query()->create([
            'name' => [
                'en' => 'Other',
                'ar' => 'أخرى',
            ],
            'code' => 'other',
        ]);
    }
}
