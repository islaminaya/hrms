<?php

declare(strict_types=1);

namespace App\Modules\JobTitle\Actions;

use App\Modules\JobTitle\Data\CreateEmployeeTitleData;
use App\Modules\JobTitle\Models\EmployeeJobTitle;

final class CreateEmployeeTitleAction
{
    public function handle(CreateEmployeeTitleData $data): EmployeeJobTitle
    {
        /** @var array<string, mixed> */
        $attributes = $data->toArray();

        return EmployeeJobTitle::query()->create($attributes);
    }
}
