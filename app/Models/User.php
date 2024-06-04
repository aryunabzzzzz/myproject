<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $timestamps = false;

    protected $table = 'users';

    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'gender',
        'email',
        'password',
        'birthday',
        'phone',
        'avatar_path',
        'country',
        'city',
        'info'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function trips(): BelongsToMany
    {
        return $this->belongsToMany(Trip::class);
    }

    public function followings(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'follower_id', 'following_id');
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'friends', 'following_id', 'follower_id');
    }


}
