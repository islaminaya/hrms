<?php

declare(strict_types=1);

namespace App\Modules\Employee\Actions;

use App\Modules\Employee\Data\CreateEmployeeData;
use App\Modules\Employee\Models\Employee;

final readonly class CreateEmployeeAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateEmployeeData $data): Employee
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Employee::query()->create($attributes);
    }
}
