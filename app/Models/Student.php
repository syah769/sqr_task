<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public const LEVEL_ONE = 1;
    public const LEVEL_TWO = 2;
    public const LEVEL_THREE = 3;

    protected $fillable = [
        'name',
        'class',
        'level',
        'parent_contact',
    ];

    protected $casts = [
        'level' => 'integer',
    ];

    public static function getLevelList(): array
    {
        return [
            self::LEVEL_ONE => 'Level 1',
            self::LEVEL_TWO => 'Level 2',
            self::LEVEL_THREE => 'Level 3',
        ];
    }
}