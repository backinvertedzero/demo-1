<?php

namespace Modules\HuntingBooking\Models;

use Carbon\Carbon;
use Database\Factories\HuntingBookingFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $tour_name
 * @property string $hunter_name
 * @property int $guide_id
 * @property Carbon $date
 * @property int $participants_count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class HuntingBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'tour_name',
        'hunter_name',
        'guide_id',
        'date',
        'participants_count',
    ];

    protected $casts = [
        'date' => 'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];


    protected static function newFactory()
    {
        return HuntingBookingFactory::new();
    }
}
