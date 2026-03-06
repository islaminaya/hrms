<?php

declare(strict_types=1);

namespace App\Modules\Achievement\Models;

use Database\Factories\AchievementFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

final class Achievement extends Model
{
    /** @use HasFactory<AchievementFactory> */
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'achievement_title',
        'achievement_year',
    ];

    protected static function newFactory(): AchievementFactory
    {
        return AchievementFactory::new();
    }
}
