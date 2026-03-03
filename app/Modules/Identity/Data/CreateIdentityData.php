<?php

declare(strict_types=1);

namespace App\Modules\Identity\Data;

use Carbon\CarbonImmutable;
use Spatie\LaravelData\Data;

final class CreateIdentityData extends Data
{
    public function __construct(
        public string $employee_id,
        public int $identity_type_id,
        public string $identity_number,
        public ?string $place_of_issue,
        public ?CarbonImmutable $issue_date,
        public CarbonImmutable $expiry_date,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}
}
