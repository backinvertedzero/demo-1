<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $tag
 * @property string $value
 * @property string $description
 */
class SystemParam extends Model
{
    protected $fillable = [
        'tag',
        'value',
        'description',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
