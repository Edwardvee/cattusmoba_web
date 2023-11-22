<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Hero
 * 
 * @property string $uuid
 * @property string $name
 * @property string $voice_actor
 * @property string $description
 * @property Carbon $birthdate
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Hero extends Model
{
	use SoftDeletes;
	protected $table = 'heroes';
	protected $primaryKey = 'name';
	public $incrementing = false;

	protected $casts = [
		'birthdate' => 'datetime'
	];

	protected $fillable = [
		'uuid',
		'voice_actor',
		'description',
		'birthdate'
	];
}
