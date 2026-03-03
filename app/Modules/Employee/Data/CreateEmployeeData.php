<?php

namespace App\Modules\Employee\Data;

use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\Validation\Min;
use Spatie\LaravelData\Data;

class CreateEmployeeData extends Data
{
    public function __construct(
        public int $user_id,
        public int|null $head_id,

        public string $employee_id,

        #[Min(2)]
        #[Max(30)]
        public string $first_name_ar,
        public string|null $middle_name_ar,
        public string|null $third_name_ar,
        public string $last_name_ar,

        public string $first_name_en,
        public string|null $middle_name_en,
        public string|null $third_name_en,
        public string $last_name_en,

        public int|null $marital_status_id,
        public int|null $religion_id,
        public int|null $special_need_id,

        public int $gender_id,
        public int $sponsorship_id,
        public int $department_id,
        public int $nationality_id,
        public int $place_or_birth,

        public string $email,
        public string $phone,
        public string|null $image,

        public string $date_of_birth,
        public string $joining_date,
        public string|null $leaving_date,

        public string|null $home_telephone_number,
        public string|null $home_country_identity,
        public string|null $blood_type,

        public bool $is_active,

        public int|null $created_by,
        public int|null $updated_by,
    ) {}
}
