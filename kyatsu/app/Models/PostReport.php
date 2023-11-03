<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostReport extends Model
{
    use HasFactory, HasUuids, SoftDeletes, HasUuids;
    protected $primaryKey = "uuid";
    public $incrementing = false;
}
