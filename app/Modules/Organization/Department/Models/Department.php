<?php

namespace App\Modules\Organization\Department\Models;

use Database\Factories\DepartmentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
* @property \Illuminate\Support\Carbon|null $created_at
* @property \Illuminate\Support\Carbon|null $updated_at
*/
class Department extends Model
{
    /** @use HasFactory<\Database\Factories\DepartmentFactory> */
    use HasFactory;

    use HasTranslations;
    /** @var array<string> $translatable*/
    public $translatable = ['name'];

    protected static function newFactory(): DepartmentFactory
    {
        return DepartmentFactory::new();
    }

    protected $fillable = [
        'name',
        'code',
        'type',
        'is_active',
        'parent_id',
        'created_by',
        'updated_by',
    ];
}
