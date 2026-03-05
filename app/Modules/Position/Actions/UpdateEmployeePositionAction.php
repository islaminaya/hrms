<?php

declare(strict_types=1);

namespace App\Modules\Position\Actions;

use App\Modules\Position\Data\UpdateEmployeePositionData;
use App\Modules\Position\Models\EmployeePosition;

final readonly class UpdateEmployeePositionAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateEmployeePositionData $data, EmployeePosition $position): EmployeePosition
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($position, function (EmployeePosition $position) use ($attributes): void {
            $position->update($attributes);
        });
    }
}
