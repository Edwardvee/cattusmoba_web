<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Contracts\Role as RoleImplementation;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;


/**
 * Class Role
 * 
 * @property string $uuid
 * @property string $name
 * @property string $guard_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ModelHasRole[] $model_has_roles
 * @property Collection|Permission[] $permissions
 *
 * @package App\Models
 */
class Role extends SpatieRole implements RoleImplementation
{
	use HasUuids;
	protected $table = 'roles';
	protected $primaryKey = 'uuid';
	public $incrementing = false;

	protected $fillable = [
		'name',
		'guard_name'
	];
}
