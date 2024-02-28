<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    // uuid se define aquí, no hay que hacer nada más. Ya se añade solo. 
    use HasFactory, HasUuids;
    protected $fillable = [
        'user_id',
        'coordinates',
        'title',
        'body',
        'location_type',
        'address',
        'services',
        'price',
        'opening_hours',
        'comments',
        'images'
    ];

    // With this we are telling PHP gods to read those properties as arrays.
    protected $casts = [
        'coordinates' => 'array',
        'services' => 'array',
        'comments' => 'array',
        'images' => 'array'
    ];

    /**
     * Get the user that owns the Location
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
