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
 * Class Banreason
 * 
 * @property string $uuid
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Ban[] $bans
 *
 * @package App\Models
 */
class Banreason extends Model
{
	use SoftDeletes, HasUuids;
	protected $table = 'banreasons';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name'
	];

	public function bans()
	{
		return $this->hasMany(Ban::class, 'ban_reason_uuid');
	}
}
