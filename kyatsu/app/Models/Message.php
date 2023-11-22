<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * 
 * @property string $uuid
 * @property string $content
 * @property string $chat_user_uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ChatUser $chat_user
 *
 * @package App\Models
 */
class Message extends Model
{
	use HasFactory, HasUuids;
	protected $table = 'messages';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'content',
		'chat_user_uuid'
	];

	public function chat_user()
	{
		return $this->belongsTo(ChatUser::class, 'chat_user_uuid');
	}
}
