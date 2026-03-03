<?php

declare(strict_types=1);

namespace App\Modules\Employee\Data;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class UpdateEmployeeData extends Data
{
    public function __construct(
        public int $user_id,
        public int|Optional $head_id,

        public string $employee_id,

        public string $first_name_ar,
        public string|Optional $middle_name_ar,
        public string|Optional $third_name_ar,
        public string $last_name_ar,

        public string $first_name_en,
        public string|Optional $middle_name_en,
        public string|Optional $third_name_en,
        public string $last_name_en,

        public int|Optional $marital_status_id,
        public int|Optional $religion_id,
        public int|Optional $special_need_id,

        public int $gender_id,
        public int $sponsorship_id,
        public int $department_id,
        public int $nationality_id,
        public int $place_or_birth,

        public string $email,
        public string $phone,
        public string|Optional $image,

        public string $date_of_birth,
        public string $joining_date,
        public string|Optional $leaving_date,

        public string|Optional $home_telephone_number,
        public string|Optional $home_country_identity,
        public string|Optional $blood_type,

        public bool $is_active,

        public int|Optional $created_by,
        public int|Optional $updated_by,
    ) {}
}
