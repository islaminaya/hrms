<?php

declare(strict_types=1);

namespace App\Modules\Position\Concerns;

trait PositionValidationRules
{
    /**
     * Summary of positionRules
     *
     * @return array<string, mixed>
     */
    public static function positionRules(): array
    {
        return [
            'name' => ['array', 'required'],
            'name.ar' => ['string', 'min:2', 'max:100'],
            'name.en' => ['string', 'min:2', 'max:100'],
            'code' => ['nullable', 'string', 'max:30'],
            'created_by' => ['nullable', 'integer'],
            'updated_by' => ['nullable', 'integer'],
        ];
    }
}
