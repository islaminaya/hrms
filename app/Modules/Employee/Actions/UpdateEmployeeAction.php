<?php

declare(strict_types=1);

namespace App\Modules\Employee\Actions;

use App\Modules\Employee\Data\UpdateEmployeeData;
use App\Modules\Employee\Models\Employee;

final readonly class UpdateEmployeeAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateEmployeeData $data, Employee $employee): Employee
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($employee, function (Employee $employee) use ($attributes): void {
            $employee->update($attributes);
        });
    }
}
