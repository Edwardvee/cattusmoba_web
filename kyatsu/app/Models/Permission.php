<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Models\Permission as SpatiePermission;
use Spatie\Permission\Contracts\Permission as PermissionImplementation;
class Permission extends SpatiePermission implements PermissionImplementation
{
    use HasUuids;
    protected $primaryKey = "uuid";
    public $incrementing = false;
}
