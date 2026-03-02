<?php

namespace Database\Factories;

use App\Modules\Organization\Department\Enums\DepartmentType;
use App\Modules\Organization\Department\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<Department>
 */
class DepartmentFactory extends Factory
{
    protected $model = Department::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => [
                'en' => fake()->company(),
                'ar' => fake('ar')->company(),
            ],
            'code' => fake()->unique()->bothify('DEPT-###'),
            'type' => fake()->randomElement(DepartmentType::cases()),
            'is_active' => fake()->boolean(),
            'parent_id' => null,
            'created_by' => null,
            'updated_by' => null,
        ];
    }
}
