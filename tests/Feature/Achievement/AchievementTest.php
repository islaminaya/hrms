<?php

declare(strict_types=1);

use App\Modules\Achievement\Actions\CreateAchievementAction;
use App\Modules\Achievement\Actions\DeleteAchievementAction;
use App\Modules\Achievement\Actions\UpdateAchievementAction;
use App\Modules\Achievement\Data\CreateAchievementData;
use App\Modules\Achievement\Data\UpdateAchievementData;
use App\Modules\Achievement\Models\Achievement;
use Illuminate\Validation\ValidationException;

test('creates an achievement with valid data', function (): void {

    $this->seed();
    $achievement = Achievement::factory()->raw();

    $created = (new CreateAchievementAction())
        ->handle(CreateAchievementData::from($achievement));

    $this->assertInstanceOf(Achievement::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updated an achievement with valid data', function (): void {

    $this->seed();
    $achievement = Achievement::query()->first();
    $newAchievement = Achievement::factory()->raw();

    $updated = (new UpdateAchievementAction())
        ->handle(UpdateAchievementData::from($newAchievement), $achievement);

    $this->assertInstanceOf(Achievement::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );

});

it('deletes an achievement', function (): void {

    $this->seed();
    $achievement = Achievement::factory()->create();

    (new DeleteAchievementAction())->handle($achievement);

    $this->assertDatabaseMissing($achievement);

});

it('fails to create create data object from invalid data', function (array $overrides): void {

    $this->seed();
    $achievement = Achievement::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateAchievementData::from($achievement);

})->with('invalid-data');

it('fails to create update data object from invalid data', function (array $overrides): void {

    $this->seed();
    $achievement = Achievement::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateAchievementData::from($achievement);

})->with('invalid-data');

dataset('invalid-data', [

    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'employee_id is string' => [
        ['employee_id' => 'a'],
    ],

    'achievement_title is null' => [
        ['achievement_title' => null],
    ],

    'achievement_title is too long' => [
        ['achievement_title' => str_repeat('a', 256)],
    ],

    'achievement_year is null' => [
        ['achievement_year' => null],
    ],
]);
