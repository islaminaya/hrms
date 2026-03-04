<?php

declare(strict_types=1);

namespace App\Modules\Employee\Data;

use App\Modules\Employee\Concerns\EmployeeValidationRules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateEmployeeData extends Data
{
    use EmployeeValidationRules;

    public function __construct(
        public int $user_id,
        public ?int $head_id,

        public string $employee_id,

        public string $first_name_ar,
        public ?string $middle_name_ar,
        public ?string $third_name_ar,
        public string $last_name_ar,

        public string $first_name_en,
        public ?string $middle_name_en,
        public ?string $third_name_en,
        public string $last_name_en,

        public ?int $marital_status_id,
        public ?int $religion_id,
        public ?int $special_need_id,

        public int $gender_id,
        public int $sponsorship_id,
        public int $department_id,
        public int $nationality_id,
        public ?int $place_or_birth,

        public string $email,
        public string $phone,
        public ?string $image,

        public string $date_of_birth,
        public string $joining_date,
        public ?string $leaving_date,

        public ?string $home_telephone_number,
        public ?string $home_country_identity,
        public ?string $blood_type,

        public bool $is_active,

        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::employeeRules();
    }
}
