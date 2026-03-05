<?php

declare(strict_types=1);

namespace App\Modules\Rank\Data;

use App\Modules\Rank\Concerns\RankValidationRules;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Support\Validation\ValidationContext;

final class UpdateRankData extends Data
{
    use RankValidationRules;

    /**
     * @param  array<string, string>  $name
     */
    public function __construct(
        public array $name,
        public ?string $code,
        public string $type,
        public ?int $created_by,
        public ?int $updated_by,
    ) {}

    /**
     * @return array<string, mixed>
     */
    public static function rules(?ValidationContext $context = null): array
    {
        return self::rankRules();
    }
}
