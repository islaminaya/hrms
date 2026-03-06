<?php

declare(strict_types=1);

use App\Modules\Rank\Actions\CreateRankAction;
use App\Modules\Rank\Actions\UpdateRankAction;
use App\Modules\Rank\Data\CreateRankData;
use App\Modules\Rank\Data\UpdateRankData;
use App\Modules\Rank\Models\Rank;
use Illuminate\Validation\ValidationException;

it('creates a rank with valid data', function (): void {
    $rank = Rank::factory()->raw();

    $created = (new CreateRankAction())
        ->handle(CreateRankData::from($rank));

    $this->assertInstanceOf(Rank::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updates a rank with valid data', function (): void {
    $this->seed();
    $rank = Rank::query()->first();
    $newRank = Rank::factory()->raw();

    $updated = (new UpdateRankAction())
        ->handle(UpdateRankData::from($newRank), $rank);

    $this->assertInstanceOf(Rank::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );
});

it('fails to create a create data object with invalid data', function (array $overrides): void {

    $rank = Rank::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateRankData::from($rank);

})->with('invalid-data');

it('fails to create an update data object with invalid data', function (array $overrides): void {

    $this->seed();
    $rank = Rank::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateRankData::from($rank);

})->with('invalid-data');

dataset('invalid-data', [

    'name is null' => [
        ['name' => null],
    ],

    'name is a string' => [
        ['name' => 'name'],
    ],

    'name_ar is a null' => [
        ['name' => [
            'ar' => null,
        ]],
    ],

    'name_ar is a too short' => [
        ['name' => [
            'ar' => 'a',
        ]],
    ],

    'name_ar is a too long' => [
        ['name' => [
            'ar' => str_repeat('a', 31),
        ]],
    ],

    'name_en is a null' => [
        ['name' => [
            'en' => null,
        ]],
    ],

    'name_en is a too short' => [
        ['name' => [
            'en' => 'a',
        ]],
    ],

    'name_en is a too long' => [
        ['name' => [
            'en' => str_repeat('a', 31),
        ]],
    ],

    'type is invalid' => [
        ['type' => 'invalid_type'],
    ],
]);
