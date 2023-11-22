<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Contracts\Permission as PermissionImplementation;


/**
 * Class Permission
 * 
 * @property string $uuid
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModelHasPermission[] $model_has_permissions
 * @property Collection|Role[] $roles
 *
 * @package App\Models
 */
class Permission extends SpatiePermission implements PermissionImplementation
{
	use HasUuids;
	protected $table = 'permissions';
	protected $primaryKey = 'uuid';
	public $incrementing = false;
	protected $attributes = [
		"guard_name" => "web"
	];
	protected $fillable = [
		'name',
		"guard_name"
	];
}
