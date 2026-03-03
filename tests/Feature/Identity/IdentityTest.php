<?php

declare(strict_types=1);

use App\Modules\Identity\Actions\CreateIdentityAction;
use App\Modules\Identity\Actions\UpdateIdentityAction;
use App\Modules\Identity\Data\CreateIdentityData;
use App\Modules\Identity\Data\UpdateIdentityData;
use App\Modules\Identity\Models\Identity;
use Spatie\LaravelData\Exceptions\CannotCreateData;

test('creates an identity with valid data', function (): void {
    $this->seed();

    $newIdentity = Identity::factory()->make();

    $identity = (new CreateIdentityAction())
        ->handle(CreateIdentityData::from($newIdentity));

    $this->assertInstanceOf(Identity::class, $identity);

});

test('fails to create an identity with invalid data', function (array $overrides): void {
    $this->seed();

    $newIdentity = Identity::factory()->make($overrides);

    $this->expectException(CannotCreateData::class);

    CreateIdentityData::from($newIdentity);
})->with('invalid-data');

it('updates an identity with valid data', function (): void {
    $this->seed();

    $identity = Identity::query()->first();

    $newIdentity = Identity::factory()->make();

    $updated = (new UpdateIdentityAction())->handle(UpdateIdentityData::from($newIdentity), $identity);

    $identity->refresh();

    expect($identity->identity_number)->toBe($newIdentity->identity_number);
    expect($identity->place_of_issue)->toBe($newIdentity->place_of_issue);
    expect($identity->issue_date->equalTo($newIdentity->issue_date))->toBeTrue();
    expect($identity->expiry_date->equalTo($newIdentity->expiry_date))->toBeTrue();
});

it('fails to update an identity with invalid data', function (array $overrides): void {
    $this->seed();

    $identity = Identity::query()->first();

    $newIdentity = Identity::factory()->make($overrides);

    $this->expectException(CannotCreateData::class);

    UpdateIdentityData::from($newIdentity);
})->with('invalid-data');

dataset('invalid-data', [
    'employee_id is null' => [
        ['employee_id' => null],
    ],

    'identity_type_id is null' => [
        ['identity_type_id' => null],
    ],

    'identity_number is null' => [
        ['identity_number' => null],
    ],
]);
