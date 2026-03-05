<?php

declare(strict_types=1);

namespace App\Modules\Rank\Actions;

use App\Modules\Rank\Data\UpdateEmployeeRankData;
use App\Modules\Rank\Models\EmployeeRank;

final readonly class UpdateEmployeeRankAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateEmployeeRankData $data, EmployeeRank $rank): EmployeeRank
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($rank, function (EmployeeRank $rank) use ($attributes): void {
            $rank->update($attributes);
        });

    }
}
