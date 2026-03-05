<?php

declare(strict_types=1);

namespace App\Modules\Position\Actions;

use App\Modules\Position\Data\UpdatePositionData;
use App\Modules\Position\Models\Position;

final readonly class UpdatePositionAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdatePositionData $data, Position $position): Position
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($position, function (Position $position) use ($attributes): void {
            $position->update($attributes);
        });
    }
}
