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
      'cover_path'
    ];

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
