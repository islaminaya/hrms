<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Actions;

use App\Modules\JobTitle\Data\UpdateEmployeeTitleData;
use App\Modules\JobTitle\Models\EmployeeJobTitle;

final class UpdateEmployeeTitleAction
{
    public function handle(UpdateEmployeeTitleData $data, EmployeeJobTitle $employeeJobTitle): EmployeeJobTitle
    {
        /** @var array<string, mixed> */
        $attributes = $data->toArray();

        return tap($employeeJobTitle, function (EmployeeJobTitle $employeeJobTitle) use ($attributes): void {
            $employeeJobTitle->update($attributes);
        });

    }
}
