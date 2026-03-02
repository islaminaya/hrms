<?php

namespace App\Modules\Shared\MaritalStatus\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class MaritalStatus extends Model
{
    use HasTranslations;
    /** @var array<string> $translatable*/
    public $translatable = ['name'];

    protected $fillable = [
        'name',
        'code',
        'created_by',
        'updated_by',
    ];
}
