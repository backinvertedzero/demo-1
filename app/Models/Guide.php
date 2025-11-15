<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property int $experience_years
 * @property boolean $is_active
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Guide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'experience_years',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
