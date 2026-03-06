<?php

declare(strict_types=1);

use App\Modules\Experience\Actions\CreateExperienceAction;
use App\Modules\Experience\Actions\DeleteExperienceAction;
use App\Modules\Experience\Actions\UpdateExperienceAction;
use App\Modules\Experience\Data\CreateExperienceData;
use App\Modules\Experience\Data\UpdateExperienceData;
use App\Modules\Experience\Models\Experience;
use Illuminate\Validation\ValidationException;

it('creates an experience with valid data', function (): void {

    $this->seed();
    $experience = Experience::factory()->raw();

    $created = (new CreateExperienceAction())
        ->handle(CreateExperienceData::from($experience));

    $this->assertInstanceOf(Experience::class, $created);
    $this->assertDatabaseHas(
        $created->getTable(),
        $created->getAttributes()
    );
});

it('updates an experience with valid data', function (): void {

    $this->seed();
    $experience = Experience::query()->first();
    $newExperience = Experience::factory()->raw();

    $updated = (new UpdateExperienceAction())
        ->handle(UpdateExperienceData::from($newExperience), $experience);

    $this->assertInstanceOf(Experience::class, $updated);
    $this->assertDatabaseHas(
        $updated->getTable(),
        $updated->getAttributes()
    );
});

it('deletes an experience', function (): void {

    $this->seed();
    $experience = Experience::factory()->create();

    (new DeleteExperienceAction())->handle($experience);

    $this->assertDatabaseMissing(
        $experience->getTable(),
        $experience->getAttributes()
    );
});

it('fails to create a create data object with invalid data', function (array $overrides): void {

    $this->seed();
    $experience = Experience::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    CreateExperienceData::from($experience);

})->with('invalid-data');

it('fails to create an update data object with invalid data', function (array $overrides): void {

    $this->seed();
    $experience = Experience::factory()->raw($overrides);

    $this->expectException(ValidationException::class);

    UpdateExperienceData::from($experience);

})->with('invalid-data');

dataset('invalid-data', [

    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'employee_id is string' => [
        ['employee_id' => 'a'],
    ],

    'position is too long' => [
        ['position' => str_repeat('a', 256)],
    ],

    'organization is too long' => [
        ['organization' => str_repeat('a', 256)],
    ],

    'city is too long' => [
        ['city' => str_repeat('a', 256)],
    ],

    'department is too long' => [
        ['department' => str_repeat('a', 256)],
    ],

    'section is too long' => [
        ['section' => str_repeat('a', 256)],
    ],

    'start_date is not a valid date' => [
        ['start_date' => 'not a valid date'],
    ],

    'end_date is not a valid date' => [
        ['end_date' => 'not a valid date'],
    ],

    'end_date is after the start_date' => [
        [
            'start_date' => '2026-03-06',
            'end_date' => '2026-03-05',
        ],
    ],

]);
