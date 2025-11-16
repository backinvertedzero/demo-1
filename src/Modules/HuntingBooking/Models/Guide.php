<?php

namespace Modules\HuntingBooking\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use RuntimeException;

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
    protected $casts = [
        'is_active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected $fillable = [];

    public static function create(array $attributes = [])
    {
        throw new RuntimeException('BookingGuide is read-only model');
    }

    public function update(array $attributes = [], array $options = [])
    {
        throw new RuntimeException('BookingGuide is read-only model');
    }

    public function save(array $options = [])
    {
        throw new RuntimeException('BookingGuide is read-only model');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}
