<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'profile_img',
        'description',
        'website',
        'facebook',
        'instagram',
        'twitter',
        'youtube'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
