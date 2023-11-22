<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PostReport
 * 
 * @property string $uuid
 * @property string $reporter_uuid
 * @property string $banReason_uuid
 * @property int $post_uuid
 * @property string $message
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Foro $foro
 *
 * @package App\Models
 */
class PostReport extends Model
{
	use HasFactory, HasUuids, SoftDeletes;
	protected $table = 'post_reports';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $casts = [
		'post_uuid' => 'int'
	];

	protected $fillable = [
		'reporter_uuid',
		'banReason_uuid',
		'post_uuid',
		'message'
	];

	public function foro()
	{
		return $this->belongsTo(Foro::class, 'post_uuid');
	}
}
