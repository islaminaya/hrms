<?php

declare(strict_types=1);

namespace App\Modules\Position\Data;

use App\Modules\Position\Concerns\PositionValidationRules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdatePositionData extends Data
{
    use PositionValidationRules;

    /**
     * @param  array<string, string>  $name
     */
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
        return self::positionRules();
    }
}
