<?php

declare(strict_types=1);

namespace App\Modules\Position\Actions;

use App\Modules\Position\Data\CreateEmployeePositionData;
use App\Modules\Position\Models\EmployeePosition;

final readonly class CreateEmployeePositionAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateEmployeePositionData $data): EmployeePosition
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return EmployeePosition::query()->create($attributes);
    }
}
