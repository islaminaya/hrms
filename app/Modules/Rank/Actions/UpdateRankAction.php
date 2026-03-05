<?php

declare(strict_types=1);

namespace App\Modules\Rank\Actions;

use App\Modules\Rank\Data\UpdateRankData;
use App\Modules\Rank\Models\Rank;

final readonly class UpdateRankAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateRankData $data, Rank $rank): Rank
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($rank, function (Rank $rank) use ($attributes): void {
            $rank->update($attributes);
        });
    }
}
