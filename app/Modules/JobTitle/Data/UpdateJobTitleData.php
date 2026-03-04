<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Data;

use App\Modules\JobTitle\Concerns\JobTitleValidationRules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateJobTitleData extends Data
{
    use JobTitleValidationRules;

    /** @param  array<string, string>  $name  */
    public function __construct(
        public array $name,
        public ?string $code,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::jobTitleRules();
    }
}
