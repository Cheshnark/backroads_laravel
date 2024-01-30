<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = [
        'coordinates',
        'title',
        'body',
        'location_type',
        'address',
        'services',
        'price',
        'opening_hours',
        'images'
    ];

    /**
     * Get the user that owns the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    }
}
