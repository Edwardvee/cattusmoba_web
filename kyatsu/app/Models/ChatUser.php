<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ChatUser
 * 
 * @property string $uuid
 * @property string $user_uuid
 * @property string $chat_uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Chat $chat
 * @property User $user
 * @property Collection|Message[] $messages
 *
 * @package App\Models
 */
class ChatUser extends Model
{
	use SoftDeletes, HasUuids;
	protected $table = 'chat_user';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'user_uuid',
		'chat_uuid'
	];

	public function chat()
	{
		return $this->belongsTo(Chat::class, 'chat_uuid');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'user_uuid');
	}

	public function messages()
	{
		return $this->hasMany(Message::class, 'chat_user_uuid');
	}
}
