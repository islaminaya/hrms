<?php

declare(strict_types=1);

use App\Modules\Identity\Actions\CreateIdentityAction;
use App\Modules\Identity\Actions\UpdateIdentityAction;
use App\Modules\Identity\Data\CreateIdentityData;
use App\Modules\Identity\Data\UpdateIdentityData;
use App\Modules\Identity\Models\Identity;
use Illuminate\Validation\ValidationException;

test('creates an identity with valid data', function (): void {
    $this->seed();
    $newIdentity = Identity::factory()->make();

    $identity = (new CreateIdentityAction())
        ->handle(CreateIdentityData::from($newIdentity));

    $this->assertInstanceOf(Identity::class, $identity);
    $this->assertDatabaseHas(
        $identity->getTable(),
        $identity->getAttributes()
    );
});

it('updates an identity with valid data', function (): void {
    $this->seed();
    $identity = Identity::query()->first();
    $newIdentity = Identity::factory()->make();

    (new UpdateIdentityAction())
        ->handle(UpdateIdentityData::from($newIdentity), $identity);

    $identity->refresh();

    $this->assertInstanceOf(Identity::class, $identity);
    $this->assertDatabaseHas(
        $identity->getTable(),
        $identity->getAttributes()
    );
});

test('fails to create an identity with invalid data', function (array $overrides): void {
    $this->seed();
    $newIdentity = Identity::factory()->make($overrides);

    $this->expectException(ValidationException::class);

    CreateIdentityData::from($newIdentity);
})->with('invalid-data');

it('fails to create data object with invalid data', function (array $overrides): void {
    $this->seed();
    $identity = Identity::factory()->make($overrides);

    $this->expectException(ValidationException::class);

    UpdateIdentityData::from($identity);
})->with('invalid-data');

dataset('invalid-data', [
    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'employee_id is string' => [
        ['employee_id' => 'a'],
    ],

    'identity_type_id is null' => [
        ['identity_type_id' => null],
    ],

    'identity_type_id is string' => [
        ['identity_type_id' => 'a'],
    ],

    'identity_type_id is does not exist' => [
        ['identity_type_id' => 'does-not-exist'],
    ],

    'identity_number is null' => [
        ['identity_number' => null],
    ],

    'identity_number is short' => [
        ['identity_number' => '1'],
    ],

    'identity_number is long' => [
        ['identity_number' => str_repeat('a', 11)],
    ],
]);
