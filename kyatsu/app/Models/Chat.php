<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;


/**
 * Class Chat
 * 
 * @property string $uuid
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|User[] $users
 *
 * @package App\Models
 */
class Chat extends Model
{
	use HasFactory, HasUuids;
	protected $table = 'chats';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	public function users()
	{
		/*return $this->belongsToMany(User::class, 'chat_user', 'chat_uuid', 'user_uuid')
					->withPivot('uuid', 'deleted_at')->usingTrait(HasUuids::class)
					->withTimestamps();*/
		return $this->belongsToMany(User::class)->using(new class extends Pivot {
			protected $primaryKey = "uuid";
			public $incrementing = false;
			use HasUuids;
		});		
	}
}
