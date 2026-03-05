<?php

declare(strict_types=1);

namespace App\Modules\Rank\Concerns;

use App\Modules\Rank\Enums\RankType;
use Illuminate\Validation\Rule;

trait RankValidationRules
{
    /**
     * @return array<string, mixed>
     */
    public static function rankRules(): array
    {
        return [
            'name' => ['required', 'array'],
            'name.ar' => ['required', 'string', 'min:2', 'max:50'],
            'name.en' => ['required', 'string', 'min:2', 'max:50'],
            'code' => ['nullable', 'string', 'min:2', 'max:30'],
            'type' => ['required', Rule::enum(RankType::class)],
        ];
    }
}
