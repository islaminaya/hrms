<?php

declare(strict_types=1);

namespace App\Modules\Identity\Models;

use Carbon\CarbonImmutable;
use Database\Factories\IdentityFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $employee_id
 * @property int $identity_type_id
 * @property string $identity_number
 * @property string|null $place_of_issue
 * @property CarbonImmutable $issue_date
 * @property CarbonImmutable $expiry_date
 * @property int|null $created_by
 * @property int|null $updated_by
 */
final class Identity extends Model
{
    /** @use HasFactory<IdentityFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'identity_type_id',
        'identity_number',
        'place_of_issue',
        'issue_date',
        'expiry_date',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): IdentityFactory
    {
        return IdentityFactory::new();
    }

    protected function casts(): array
    {
        return [
            'issue_date' => 'immutable_datetime',
            'expiry_date' => 'immutable_datetime',
        ];
    }
}
