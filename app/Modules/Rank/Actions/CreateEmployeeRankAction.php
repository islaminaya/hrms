<?php

declare(strict_types=1);

namespace App\Modules\Rank\Actions;

use App\Modules\Rank\Data\CreateEmployeeRankData;
use App\Modules\Rank\Models\EmployeeRank;

final readonly class CreateEmployeeRankAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateEmployeeRankData $data): EmployeeRank
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return EmployeeRank::query()->create($attributes);
    }
}
