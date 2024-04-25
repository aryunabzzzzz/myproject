<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'follower_id',
        'following_id'
    ];
}
