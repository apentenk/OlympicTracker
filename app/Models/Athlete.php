<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Athlete extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'fname',
        'lname',
        'country',
        'gold',
        'silver',
        'bronze'
    ];

    /**
     * Get all the Sports that that this athlete competes in
     */
    public function sports(): BelongsToMany
    {
        return $this->belongsToMany(Sport::class)->withTimeStamps();
    }
}
