<?php

declare(strict_types=1);

namespace App\Modules\Identity\Actions;

use App\Modules\Identity\Data\UpdateIdentityData;
use App\Modules\Identity\Models\Identity;

final readonly class UpdateIdentityAction
{
    /**
     * Execute the action.
     */
    public function handle(UpdateIdentityData $data, Identity $identity): Identity
    {
        /** @var array<string, mixed> $attributes */
        $attributes = $data->toArray();

        return tap($identity, function (Identity $identity) use ($attributes): void {
            $identity->update($attributes);
        });
    }
}
