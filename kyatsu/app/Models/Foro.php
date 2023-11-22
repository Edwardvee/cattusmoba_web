<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Carbon\Factory;
use Database\Factories\forumFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Foro
 * 
 * @property int $id
 * @property int|null $isChildOf
 * @property string $user_poster
 * @property string $content
 * @property int $reply_count
 * @property int $like_count
 * @property Carbon $created_at
 * @property Carbon $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|PostReport[] $post_reports
 *
 * @package App\Models
 */
class Foro extends Model
{
	use SoftDeletes, HasFactory;
	protected $table = 'foro';

	protected $casts = [
		'isChildOf' => 'int',
		'reply_count' => 'int',
		'like_count' => 'int'
	];

	protected $fillable = [
		'isChildOf',
		'user_poster',
		'uuid_user',
		'content',
		'reply_count',
		'like_count',
		'updated_count'

	];

	public function post_reports()
	{
		return $this->hasMany(PostReport::class, 'post_uuid');
	}
	public static function newFactory() {
		return forumFactory::new();
	}
}
