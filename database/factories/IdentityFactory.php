<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\User;
use App\Modules\Employee\Models\Employee;
use App\Modules\Identity\Models\Identity;
use App\Modules\Identity\Models\IdentityType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Identity>
 */
final class IdentityFactory extends Factory
{
    protected $model = Identity::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->randomElement(Employee::query()->pluck('id')->toArray()),
            'identity_type_id' => fake()->randomElement(IdentityType::query()->pluck('id')->toArray()),
            'identity_number' => fake()->unique()->regexify('[12][0-9]{9}'),
            'place_of_issue' => fake()->city(),
            'issue_date' => $issueDate = fake()->date(),
            'expiry_date' => fake()->dateTimeBetween($issueDate, '+2 years')->format('Y-m-d'),
            'created_by' => fake()->randomElement([null, ...User::query()->pluck('id')->toArray()]),
            'updated_by' => fake()->randomElement([null, ...User::query()->pluck('id')->toArray()]),
        ];
    }
}
