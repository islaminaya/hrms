<?php

declare(strict_types=1);

namespace App\Modules\Identity\Actions;

use App\Modules\Identity\Data\CreateIdentityData;
use App\Modules\Identity\Models\Identity;

final readonly class CreateIdentityAction
{
    /**
     * Execute the action.
     */
    public function handle(CreateIdentityData $data): Identity
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return Identity::query()->create($attributes);
    }
}
