<?php

declare(strict_types=1);

namespace App\Modules\Position\Actions;

use App\Modules\Position\Data\CreatePositionData;
use App\Modules\Position\Models\Position;

final readonly class CreatePositionAction
{
    /**
     * Execute the action.
     */
    public function handle(CreatePositionData $data): Position
    {
        /** @var array<string, string> $attributes */
        $attributes = $data->toArray();

        return Position::query()->create($attributes);
    }
}
