<?php

namespace App\Models;

use Database\Factories\HeroesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Heroes extends Model
{
    use HasUuids;
    protected $primaryKey = "uuid";
    public $incrementing = false;
    use SoftDeletes;
    protected $table = 'heroes';
    protected $info = [
        'uuid',
       'name',
       'description',
       'created_at',
       'updated_at',
       'deleted_at'
    ];
}
