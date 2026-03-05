<?php

declare(strict_types=1);

use App\Modules\Position\Actions\CreatePositionAction;
use App\Modules\Position\Actions\UpdatePositionAction;
use App\Modules\Position\Data\CreatePositionData;
use App\Modules\Position\Data\UpdatePositionData;
use App\Modules\Position\Models\Position;
use Illuminate\Validation\ValidationException;

it('creates a position with valid data', function (): void {
    $attributes = Position::factory()->raw();

    $created = (new CreatePositionAction())
        ->handle(CreatePositionData::from($attributes));

    $this->assertInstanceOf(Position::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updates a position with valid data', function (): void {
    $this->seed();
    $position = Position::query()->first();
    $newPosition = Position::factory()->raw();

    $updated = (new UpdatePositionAction())
        ->handle(UpdatePositionData::from($newPosition), $position);

    $this->assertInstanceOf(Position::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes(),
    );
});

it('fails to create create data object with invalid data', function (array $overrides): void {
    $this->seed();
    $position = Position::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreatePositionData::from($position);
})->with('invalid-data');

it('fails to create update data object with invalid data', function (array $overrides): void {
    $this->seed();

    $this->expectException(ValidationException::class);

    UpdatePositionData::from($overrides);

})->with('invalid-data');

dataset('invalid-data', [
    'name is null' => [
        ['name' => null],
    ],
    'name is string' => [
        ['name' => 'a'],
    ],
    'name_ar is short' => [
        ['name' => [
            'ar' => 'a',
        ]],
    ],
    'name_ar is long' => [
        ['name' => [
            'ar' => str_repeat('a', 101),
        ]],
    ],
    'name_en is short' => [
        ['name' => [
            'en' => 'a',
        ]],
    ],
    'name_en is long' => [
        ['name' => [
            'en' => str_repeat('a', 101),
        ]],
    ],
]);
