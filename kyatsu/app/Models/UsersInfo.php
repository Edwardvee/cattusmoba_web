<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class UsersInfo
 * 
 * @property string $user_id
 * @property string $username
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $profile_pic
 * @property string $current_rank
 * @property string $current_elo
 * @property string $description
 * @property string $matches_played
 * @property string $winrate
 * @property string $main_role
 *
 * @package App\Models
 */
class UsersInfo extends Model
{
	protected $table = 'users_info';
	protected $primaryKey = 'username';
	public $incrementing = false;

	protected $fillable = [
		'user_id',
		'profile_pic',
		'current_rank',
		'current_elo',
		'description',
		'matches_played',
		'winrate',
		'main_role'
	];
}
