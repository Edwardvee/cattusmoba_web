<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Cog\Contracts\Ban\Bannable as BannableInterface;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Database\Eloquent\Relations\Pivot;

class User extends Authenticatable implements BannableInterface
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasUuids, HasRoles, Bannable;

    protected $primaryKey = "uuid";
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public static function newFactory(): Factory
    {
        return UserFactory::new();
    }
    public function chats() {
        return $this->belongsToMany(Chat::class)->using(new class extends Pivot {
            protected $primaryKey = "uuid";
            public $incrementing = false;
            use HasUuids;
        });
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }
}
