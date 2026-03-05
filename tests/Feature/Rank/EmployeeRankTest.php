<?php

declare(strict_types=1);

use App\Modules\Rank\Actions\CreateEmployeeRankAction;
use App\Modules\Rank\Actions\UpdateEmployeeRankAction;
use App\Modules\Rank\Data\CreateEmployeeRankData;
use App\Modules\Rank\Data\UpdateEmployeeRankData;
use App\Modules\Rank\Models\EmployeeRank;
use Illuminate\Validation\ValidationException;

it('creates an employee rank with valid data', function (): void {
    $this->seed();
    $rank = EmployeeRank::factory()->raw();

    $created = (new CreateEmployeeRankAction())
        ->handle(CreateEmployeeRankData::from($rank));

    $this->assertInstanceOf(EmployeeRank::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updates an employee rank with valid data', function (): void {
    $this->seed();
    $rank = EmployeeRank::query()->first();
    $newRank = EmployeeRank::factory()->raw();

    $updated = (new UpdateEmployeeRankAction())
        ->handle(UpdateEmployeeRankData::from($newRank), $rank);

    $this->assertInstanceOf(EmployeeRank::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );
});

it('fails to crate a create data object with invalid data', function (array $overrides): void {

    $this->seed();
    $rank = EmployeeRank::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateEmployeeRankData::from($rank);

})->with('invalid-data');

it('fails to crate an update data object with invalid data', function (array $overrides): void {

    $this->seed();
    $rank = EmployeeRank::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateEmployeeRankData::from($rank);

})->with('invalid-data');

dataset('invalid-data', [

    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'rank_id is null' => [
        ['rank_id' => null],
    ],

    'start_date is null' => [
        ['start_date' => null],
    ],

    'end_date is before start_date' => [
        [
            'start_date' => '2026-03-06',
            'end_date' => '2026-03-05',
        ],
    ],
]);
