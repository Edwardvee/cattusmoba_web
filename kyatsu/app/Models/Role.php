<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Role as SpatieRole;
use Spatie\Permission\Contracts\Role as RoleImplementation;
class Role extends SpatieRole implements RoleImplementation
{
    use HasUuids;
    protected $primaryKey = "uuid";
    public $incrementing = false;
}
