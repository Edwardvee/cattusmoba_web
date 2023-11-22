<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Noticia
 * 
 * @property string $uuid
 * @property string $name
 * @property string $category
 * @property string $content
 * @property Carbon $created_at
 * @property string|null $deleted_at
 *
 * @package App\Models
 */
class Noticia extends Model
{
	use SoftDeletes;
	protected $table = 'noticias';
	public $incrementing = false;
	public $timestamps = false;

	protected $fillable = [
		'uuid',
		'name',
		'category',
		'content'
	];
}
