<?php

declare(strict_types=1);

namespace App\Modules\Rank\Actions;

use App\Modules\Rank\Data\CreateRankData;
use App\Modules\Rank\Models\Rank;

final readonly class CreateRankAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateRankData $data): Rank
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Rank::query()->create($attributes);
    }
}
