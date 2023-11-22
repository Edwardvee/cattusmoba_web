<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Cog\Laravel\Ban\Traits\Bannable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cog\Contracts\Ban\Bannable as BannableInterface;

use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 * 
 * @property string $uuid
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property Carbon|null $banned_at
 * 
 * @property Collection|Chat[] $chats
 *
 * @package App\Models
 */
class User extends Authenticatable implements BannableInterface
{
	use HasFactory, SoftDeletes, HasUuids, HasRoles, Bannable;
	protected $table = 'users';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $casts = [
		'email_verified_at' => 'datetime',
		'banned_at' => 'datetime'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'email_verified_at',
		'password',
		'remember_token',
		'banned_at'
	];

	public function chats()
	{
		return $this->belongsToMany(Chat::class, 'chat_user', 'user_uuid', 'chat_uuid')
					->withPivot('uuid', 'deleted_at')
					->withTimestamps();
	}
	public function messages() {
		return $this->hasManyThrough(Message::class, ChatUser::class);
	}
}
