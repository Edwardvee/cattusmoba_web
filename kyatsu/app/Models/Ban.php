<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Ban
 * 
 * @property int $id
 * @property string $bannable_type
 * @property string $bannable_id
 * @property string|null $created_by_type
 * @property string|null $created_by_id
 * @property string|null $comment
 * @property Carbon|null $expired_at
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $ban_reason_uuid
 * 
 * @property Banreason|null $banreason
 *
 * @package App\Models
 */
class Ban extends Model
{
	use SoftDeletes;
	protected $table = 'bans';

	protected $casts = [
		'expired_at' => 'datetime'
	];

	protected $fillable = [
		'bannable_type',
		'bannable_id',
		'created_by_type',
		'created_by_id',
		'comment',
		'expired_at',
		'ban_reason_uuid'
	];

	public function banreason()
	{
		return $this->belongsTo(Banreason::class, 'ban_reason_uuid');
	}
}
