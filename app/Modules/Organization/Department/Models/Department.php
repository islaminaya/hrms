<?php

declare(strict_types=1);

namespace App\Modules\Organization\Department\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\Translatable\HasTranslations;

/**
 * @property-read int $id
 * @property array<string, string> $name
 * @property string|null $code
 * @property string|null $type
 * @property bool $is_active
 * @property int|null $parent_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
final class Department extends Model
{
    /** @use HasFactory<DepartmentFactory> */
    use HasFactory;

    use HasTranslations;

    /** @var array<string> */
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'type',
        'is_active',
        'parent_id',
        'created_by',
        'updated_by',
    ];

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }
}
