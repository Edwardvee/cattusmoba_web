<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class banReason extends Model
{
        use HasUuids;
        protected $table = 'banReasons';
        protected $primaryKey = "uuid";
        public $incrementing = false;
        use SoftDeletes;
}
