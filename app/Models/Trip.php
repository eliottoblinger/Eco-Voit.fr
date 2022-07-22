<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $with = ['driver'];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_trip')->withPivot('qr_code_url', 'rating', 'opinion', 'is_driver');
    }

    public function driver()
    {
        return $this->users()->wherePivot('is_driver', true);
    }
}
