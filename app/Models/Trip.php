<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'trips';

    protected $fillable = [
      'name',
      'date',
      'location',
      'description',
      'status',
      'photo'
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
